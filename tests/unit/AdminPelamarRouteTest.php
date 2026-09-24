<?php

use CodeIgniter\Test\CIUnitTestCase;

final class AdminPelamarRouteTest extends CIUnitTestCase
{
    public function testPelamarAdminRoutesAreDefined(): void
    {
        $routesFile = ROOTPATH . 'app/Config/Routes.php';
        $content = file_get_contents($routesFile);

        $this->assertNotFalse($content);
        $this->assertStringContainsString("\$routes->get('admin/pelamar', 'Admin\\DaftarPelamar::index');", $content);
        $this->assertStringContainsString("\$routes->get('admin/pelamar/detail/(:num)', 'Admin\\DaftarPelamar::detail/\$1');", $content);
        $this->assertStringContainsString("\$routes->post('admin/pelamar/update-status', 'Admin\\DaftarPelamar::updateStatus');", $content);
        $this->assertStringContainsString("\$routes->get('admin/pelamar/cetak/(:num)', 'Admin\\DaftarPelamar::cetak/\$1');", $content);
    }
}
