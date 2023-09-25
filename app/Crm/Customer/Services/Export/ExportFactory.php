<?php

namespace Crm\Customer\Services\Export;

use Crm\Customer\Services\Export\ExportInterface;


class  ExportFactory
{
    public static function create(string $format): ExportInterface
    {
        $exporter = config('export.exporters')[$format] ?? null;

        if (!$exporter) {
            throw new \Exception('Exporter not found');
        }

        return new $exporter;
    }
}
