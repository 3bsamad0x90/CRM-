<?php

return [
    'exporters' => [
        'json' => \Crm\Customer\Services\Export\JsonExport::class,
        'xml' => \Crm\Customer\Services\Export\XmlExport::class,
        'excel' => \Crm\Customer\Services\Export\ExcelExport::class,
        'pdf' => \Crm\Customer\Services\Export\PdfExport::class,
    ]
];
