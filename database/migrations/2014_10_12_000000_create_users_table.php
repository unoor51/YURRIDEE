<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('user_type', User::USERS_TYPES)->default(User::RIDER_USER_TYPE);
            $table->string('password');
            $table->string('country_code')->nullable();
            $table->string('picture')->nullable();
            $table->string('device_token')->nullable();
            $table->enum('device_type',array('android','ios'));
            $table->double('latitude', 15, 8)->nullable();
            $table->double('longitude',15,8)->nullable();
            $table->float('wallet_balance')->default(0);
            $table->decimal('rating', 4, 2)->default(5);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
