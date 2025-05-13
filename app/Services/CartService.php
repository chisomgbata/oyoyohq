<?php

namespace App\Services;

use App\Models\Product;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartService
{
    public function isEmpty(): bool
    {
        $items = $this->items();
        return empty($items);
    }

    /**
     * @return array<Product>
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function items(): array
    {
        return session()->get('cart.items', []);
    }


    public function addItem(Product $item): void
    {
        $items = $this->items();
        $items[] = $item;
        $items = array_unique($items, SORT_REGULAR);
        session()->put('cart.items', $items);
    }

    public function exists($itemId): bool
    {
        $items = $this->items();

        foreach ($items as $item) {
            if ($item['id'] === $itemId) {
                return true;
            }
        }

        return false;
    }

    public function removeItem($itemId): void
    {
        $items = $this->items();
        $items = array_filter($items, function ($item) use ($itemId) {
            return $item['id'] !== $itemId;
        });
        session()->put('cart.items', $items);
    }

    public function clear(): void
    {
        session()->forget('cart.items');
    }

    public function count(): int
    {
        $items = $this->items();
        return count($items);
    }


}
