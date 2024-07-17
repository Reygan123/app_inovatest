<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $admin = $auth->createRole('admin');
        $user = $auth->createRole('user');
        $auth->add($admin);
        $auth->add($user);

        $viewPost = $auth->createPermission('viewPost');
        $viewPost->description = 'View a post';
        $auth->add($viewPost);

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        $auth->addChild($user, $viewPost);
        $auth->addChild($admin, $createPost);
        $auth->addChild($admin, $user);

        $auth->assign($admin, 1);
        $auth->assign($user, 2);
    }

    public function actionCreateRole($roleName)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($roleName);
        $auth->add($role);
        echo "Role '{$roleName}' created.\n";
    }

    public function actionAssignRole($username, $roleName)
    {
        $user = \app\models\User::findByUsername($username);
        if (!$user) {
            echo "User not found.\n";
            return;
        }

        $auth = Yii::$app->authManager;
        $role = $auth->getRole($roleName);
        if (!$role) {
            echo "Role not found.\n";
            return;
        }

        $auth->assign($role, $user->id);
        echo "Role '{$roleName}' assigned to user '{$username}'.\n";
    }
}
