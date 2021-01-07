<?php declare(strict_types=1);

namespace Yireo\ExampleDealersSampleData\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;
use Shopware\Core\Framework\Uuid\Uuid;

class Migration1610022539 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1610022539;
    }

    public function update(Connection $connection): void
    {
        $sampleData = $this->getSampleData();
        foreach ($sampleData as $sampleDataEntry) {
            $sampleDataEntry['id'] = Uuid::randomBytes();
            $sampleDataEntry['created_at'] = date('Y:m:d H:i:s', time());
            $connection->insert('dealer_entity', $sampleDataEntry);
        }
    }

    public function updateDestructive(Connection $connection): void
    {
    }

    /**
     * @return array
     */
    private function getSampleData(): array
    {
        return [
            [
                'name' => 'Batman',
                'description' => 'Dark knight',
                'address' => 'Gotham, USA',
            ],
            [
                'name' => 'Spiderman',
                'description' => 'Infected kid',
                'address' => 'New York, USA'
            ]
        ];
    }
}
