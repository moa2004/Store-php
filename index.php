<?php
class Product {
    private string $title;
    private string $image;
    private int $price;

    public function __construct(string $title, string $image, int $price) {
        $this->title = $title;
        $this->image = $image;
        $this->price = $price;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getPrice(): int {
        return $this->price;
    }
}

class Store {
    private string $name;
    private string $image;
    private string $description;
    private array $products;

    public function __construct(string $name, string $image, string $description) {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->products = [];
    }

    public function getName(): string {
        return $this->name;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getProducts(): array {
        return $this->products;
    }

    public function addProduct(Product $product): void {
        $this->products[] = $product;
    }
}

$store = new Store("Tech Store", "store.png", "The best store for all your tech needs.");

$store->addProduct(new Product("Laptop", "laptop.png", 1200));
$store->addProduct(new Product("Smartphone", "smartphone.png", 800));
$store->addProduct(new Product("Headphones", "headphones.png", 150));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .store-container {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .store-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .store-header img {
            max-width: 100px;
            margin-right: 20px;
            border-radius: 8px;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }
        .product-card {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .product-title {
            font-size: 1.1em;
            margin: 10px 0;
        }
        .product-price {
            font-weight: bold;
            color: #2d87f0;
        }
    </style>
</head>
<body>

<div class="store-container">
    <div class="store-header">
        <img src="<?= $store->getImage(); ?>" alt="<?= $store->getName(); ?>">
        <div>
            <h1><?= $store->getName(); ?></h1>
            <p><?= $store->getDescription(); ?></p>
        </div>
    </div>

    <div class="products">
        <?php foreach ($store->getProducts() as $product): ?>
            <div class="product-card">
                <img src="<?= $product->getImage(); ?>" alt="<?= $product->getTitle(); ?>">
                <div class="product-title"><?= $product->getTitle(); ?></div>
                <div class="product-price">$<?= $product->getPrice(); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
