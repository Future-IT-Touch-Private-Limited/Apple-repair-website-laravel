<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable=['short_des','goolge_link','other_phone','website_title','company_photo','description','photo','address','phone','email','logo','social_link','homepage_story','homepage_about','meta_title','meta_description','meta_keywords'];
}
