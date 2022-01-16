@switch($user->role_type)
    @case(\App\Classes\Constants\RoleType::STUDENT)
        <p>Student</p>
    @break
    @case(\App\Classes\Constants\RoleType::ADMIN)
        <p>Admin</p>
    @break
@endswitch
