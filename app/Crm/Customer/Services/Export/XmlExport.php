<?php

namespace Crm\Customer\Services\Export;

use Crm\Customer\Services\Export\ExportInterface;

class XmlExport implements ExportInterface
{
    public function export(array $data)
    {
        return json_encode($data);
    }
}
