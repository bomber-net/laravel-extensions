<?php

namespace BomberNet\LaravelExtensions\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

abstract class Authenticatable extends Model implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract
	{
		use AuthenticatableTrait,Authorizable,CanResetPassword,MustVerifyEmail,Notifiable;
	}
