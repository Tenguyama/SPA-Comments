<?php

use App\Http\Controllers\Api\v1\AttachmentController;
use App\Http\Controllers\Api\v1\CommentController;
use App\Http\Controllers\Api\v1\CommentLikeController;
use App\Http\Controllers\Api\v1\MailController;
use App\Http\Controllers\Api\v1\UserController;
use http\Env\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')
    ->group(function () {
        //error: Unable to connect to mailpit:1025 (Cannot assign requested address)
        Route::post('/mail/send', [MailController::class, 'send'])->name('mail.send');

        Route::get('/user/id/{id}', [UserController::class, 'getById'])->name('user.getById');
        Route::get('/user/email/{email}', [UserController::class, 'getByEmail'])->name('user.getByEmail');
        Route::post('/user', [UserController::class, 'save'])->name('user.save');

        Route::get('/comment-like/count/{id}',[CommentLikeController::class, 'getCountLike'])->name('commentLike.getCountLike');
        Route::post('/comment-like',[CommentLikeController::class, 'save'])->name('commentLike.save');

        Route::get('/attachments/{commentId}', [AttachmentController::class, 'getAllByComment'])->name('attachment.getAllByComment');
        Route::post('/attachment', [AttachmentController::class, 'save'])->name('attachment.save');

        Route::get('/comment/{commentId}', [CommentController::class, 'getById'])->name('comment.getById');
        Route::get('/comments/user/{userId}', [CommentController::class, 'getAllByUserId'])->name('comments.getAllByUserId');
        Route::get('/comments/parent/{parentId}', [CommentController::class, 'getAllByParentId'])->name('comments.getAllByParentId');
        Route::get('/comments/paginate/{count}/{page}/{sort_field}/{sort_direction}', [CommentController::class, 'getAllByPaginate'])
            ->name('comments.getAllByPaginate')
            ->middleware(['query_params']);
        Route::post('/comment', [CommentController::class, 'save'])->name('comment.save');
    });
