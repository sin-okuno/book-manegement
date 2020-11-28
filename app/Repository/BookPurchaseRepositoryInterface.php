<?php
declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Collection;

interface BookPurchaseRepositoryInterface
{
    public function getBookListForUser(int $id): Collection;
}
