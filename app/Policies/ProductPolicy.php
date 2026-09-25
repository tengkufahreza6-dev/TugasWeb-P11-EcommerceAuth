<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    // Hak Akses Global: Admin Memiliki Akses Penuh (Override)
    public function before(User $user, string $ability): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Product $product): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function update(User $user, Product $product): bool
    {
        // Hanya Admin & Editor yang Boleh Memperbarui Produk
        return $user->isAdmin() || $user->isEditor();
    }

    public function delete(User $user, Product $product): bool
    {
        // Hanya Admin yang Boleh Menghapus Produk
        return $user->isAdmin();
    }
}