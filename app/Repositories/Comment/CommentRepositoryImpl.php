<?php

declare(strict_types=1);

namespace App\Repositories\Comment;

use App\Data\CommentData;
use App\Data\MailData;
use App\Data\UserData;
use App\Jobs\ReplyToCommentEmailMessageJob;
use App\Models\Comment;
use App\Models\User;
use App\Repositories\User\UserRepositoryImpl;
use Carbon\Carbon;
use Spatie\LaravelData\DataCollection;

class CommentRepositoryImpl implements CommentRepository
{
    public function __construct(
        private readonly Comment $model
    ) {
    }
    public function save(CommentData $commentData): CommentData
    {
        $attributes = $commentData->toArray();
        $userRepository = new UserRepositoryImpl(new User());

        if(is_null($attributes['user_id'])) {
            $userAutor = $userRepository->save(UserData::from($attributes['user']));
            $attributes['user_id'] = $userAutor->id;
        }

        $attributes['created_at'] = is_null($attributes['created_at']) ? Carbon::now() : $attributes['created_at'] ;
        $attributes['updated_at'] =  is_null($attributes['updated_at']) ? Carbon::now() : $attributes['updated_at'];

        unset($attributes['user'],
            $attributes['id']);

        if(!is_null($attributes['parent_id'])){
           // $this->setQueueByEmailMessage($userRepository, $attributes);
        }

        return CommentData::from($this->model->query()->create($attributes));
    }

    public function getById(string $commentId): CommentData
    {
        return CommentData::from($this->model->query()->where('id','=',$commentId)->first());
    }

    public function getAllByUserId(string $userId): DataCollection
    {
        return CommentData::collection($this->model->query()->where('user_id','=',$userId)->get());
    }

    public function getAllByParentId(string $parentId): DataCollection
    {
        return CommentData::collection($this->model->query()->where('parent_id','=',$parentId)->get());
    }

    public function getAllByPaginate(int $count, int $page)
    {
        $paginatedData = $this->model->query()
            ->where('parent_id', "=",null)
            ->paginate($count, ['*'], 'page', $page);

        return $paginatedData;
    }

    private function setQueueByEmailMessage($userRepository, $attributes)
    {
        $userAutor = $userRepository->getById($attributes['user_id']);
        $parent = $this->getById($attributes['parent_id']);
        $mailData = MailData::from([
            'userEmail' => $userRepository->getById($parent->user_id),
            'sender'=>$userAutor->email,
            'mainText'=> $parent->body,
            'replyText'=> $attributes['body']
        ]);
        dispatch(new ReplyToCommentEmailMessageJob($mailData));
    }
}
