<?php
return [
    'login' => [
        'success' => 'Login successful!',
        'error' => 'Invalid credentials, please try again.',
    ],
    'user' => [
        'added' => 'User added successfully!',
        'updated' => 'User updated successfully!',
        'delete' => 'User deleted successfully!',
        'authuser' => "User Can't be deleted",
        'error' => 'An error occurred while processing the user. Please try again.',
        'profile' => 'Profile Updated successfully',
        'password' => 'Password Changed successfully',
        'passwordInvalid' => 'Invaild current password',
    ],
    'role' => [
        'added' => 'Role added successfully!',
        'updated' => 'Role updated successfully!',
        'delete' => 'Role deleted successfully!',
        'authRole' => "Role Can't be deleted",
        'error' => 'An error occurred while processing the Role. Please try again.',
    ],
    'music' => [
        'category' => [
            'added' => 'Category added successfully!',
            'updated' => 'Category updated successfully!',
            'delete' => 'Category deleted successfully!',
            'nameDublicate' => 'Category name already exit!. Please enter different category name. ',
            'inactiveError' => "Category already exit in song cann't not inactive!",
            'deleteError' => "Category already exit in song cann't delete!"
        ],
        'singer' => [
            'added' => 'Singer added successfully!',
            'updated' => 'Singer updated successfully!',
            'delete' => 'Singer deleted successfully!',
            'nameDublicate' => 'Singer name already exit!. Please enter different singer name. ',
            'inactiveError' => "Singer already exit in song cann't not inactive!",
            'deleteError' => "Singer already exit in song cann't delete!"
        ],
        'song' => [
            'added' => 'Song added successfully!',
            'updated' => 'Song updated successfully!',
            'delete' => 'Song deleted successfully!',
            'nameDublicate' => 'Song name already exit with the same category and singer!. Please enter different song name. ',
        ]
    ],
];
