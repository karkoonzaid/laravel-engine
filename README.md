# Installation

Copy or make a symlink to Mobileka directory inside `bundles/`. Make sure to
gitignore them. There are 3 bundles:

- Engine - core bundle, contains CRUD and other Laravel improvements
- Users - users and user groups, depends on Engine
- Auth - authentication/authorization, depends on Users

Register bundles in `application/bundles.php`:

```
return array(
	'engine' => array('location' => 'Mobileka/L3/Engine', 'auto' => true),
	'auth' => array('location' => 'Mobileka/L3/Auth', 'auto' => true),
	'users' => array('location' => 'Mobileka/L3/Users', 'auto' => true),
);
```

Also, these aliases must be defined (this must be fixed) in
`application/config/application.php`:

```
	'aliases' => array(
		// ... snip
		'Helpers\Arr' => 'Mobileka\L3\Engine\Laravel\Helpers\Arr',
	),
```

Run migrations:

```
$ php artisan migrate:install
$ php artisan migrate
```

Add route to handle access to admin interface:

```
Route::get('cp', array('as' => 'admin_home', 'uses' => 'users::admin.default@index'));
```

The Engine bundle contains a shitload of assets which must be published:

```
$ php artisan bundle:publish
```
If you're using Auth bundle, specify permissions in `application/config/acl.php`:

```
<?php

return array(
	'defaultResult' => false,

	'allowedRoutes' => array(
		'auth_admin_default_login',
		'auth_admin_default_logout',
	),

	'permissions' => array(

		'aliases' => array(
			'(:any)_admin_(:any)' => array('admins'),
		),

		'paths' => array(
			// 'auth::default@signin' => ['*'],
			// 'users::admin.default@index' => ['managers']
		),
	),

	'actions' => array(
	),
);
```

and specify model for authenticating users in `application/config/auth.php`:


```
'model' => 'Users\Models\User',
```

Go to http://sitename.dev/cp/, default credentials:

email: admin@example.com

password: 123456


