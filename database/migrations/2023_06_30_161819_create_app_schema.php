<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppSchema extends Migration
{
    const USERS = "users",
              TODOLISTS = "todolists",
              TASKS = "task",
              STATUS = "status",
              STEPS = "steps",
              TASK_USER = "task_user";

    public function up()
    {

    }

    protected static function createUsersTable()
    {
        Schema::create( self::USERS, function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }
    protected static function createTodolistsTable()
    {
        Schema::create( self::USERS, function (Blueprint $table){
            $table->id();
            $table->string('titulo');
            $table->string('descriptioin');
            $table->foreign('status_id')->references('id')->on(self::STATUS);
            $table->foreign('user_id')->references('id')->on(self::USERS);
            $table->timestamps();
        });
    }
    protected static function createTasksTable()
    {
        Schema::create( self::USERS, function (Blueprint $table){
            $table->id();
            $table->string('descrption');
            $table->foreign('todolist_id')->references('id')->on(self::TODOLISTS);
            $table->foreign('status_id')->references('id')->on(self::STATUS);
            $table->timestamps();
        });
    }
    protected static function createStatusTable()
    {
        Schema::create( self::USERS, function (Blueprint $table){
            $table->id();
            $table->string('name');
        });
    }
    protected static function createStepsTable()
    {
        Schema::create( self::USERS, function (Blueprint $table){
            $table->id();
            $table->string('description');
            $table->foreign('task_id')->references('id')->on(self::TASKS);
            $table->foreign('status_id')->references('id')->on(self::STATUS);
            $table->timestamps();
        });
    }
    protected static function createTaskUserTable()
    {
        Schema::create( self::USERS, function (Blueprint $table){
            $table->id();
            $table->foreign('todolist_id')->references('id')->on(self::TODOLISTS);
            $table->foreign('user_id')->references('id')->on(self::USERS);
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_schema');
    }
}
