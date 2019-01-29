<?php

use Rebing\GraphQL\Support\UploadType;
use Rebing\GraphQL\Support\Mutation;

class UserProfilePhotoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserProfilePhoto'
    ];

    public function type()
    {
        return GraphQL::type('user');
    }

    public function args()
    {
        return [
            'profilePicture' => [
                'name' => 'profilePicture',
                'type' => UploadType::getInstance(),
                'rules' => ['required', 'image', 'max:1500'],
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $file = $args['profilePicture'];
        return [
            'file' => $file
        ];
        // Do something with file here...
    }
}
