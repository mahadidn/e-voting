<?php

namespace Klp12\Evoting\Service;

use Klp12\Evoting\Config\Database;
use Klp12\Evoting\Model\Domain\Admin;
use Klp12\Evoting\Repository\AdminRepository;
use PHPUnit\Framework\TestCase;

class AdminServiceTest extends TestCase {

    private AdminRepository $adminRepository;
    private AdminService $adminService;
    
    protected function setUp(): void{
        $connection = Database::getConnection("prod");
        $this->adminRepository = new AdminRepository($connection);
        $this->adminService = new AdminService($this->adminRepository);
    }

    public function testRegisterAdminSuccess(){

        $admin = new Admin();
        $admin->username = "admin";
        $admin->password = "admin123";
        $admin->email = "admin@gmail.com";

        $response = $this->adminService->registerAdmin($admin);

        self::assertEquals($admin->username, $response->username);
        self::assertEquals($admin->email, $response->email);

        self::assertTrue(password_verify($admin->password, $response->password));
    }


}

