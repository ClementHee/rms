<?php

declare(strict_types=1);

namespace OpenSpout\Writer\XLSX;

use OpenSpout\Common\Helper\Escaper\XLSX;
use OpenSpout\Common\Helper\StringHelper;
use OpenSpout\Writer\AbstractWriterMultiSheets;
use OpenSpout\Writer\Common\Entity\Workbook;
use OpenSpout\Writer\Common\Helper\ZipHelper;
use OpenSpout\Writer\Common\Manager\Style\StyleMerger;
use OpenSpout\Writer\XLSX\Helper\FileSystemHelper;
use OpenSpout\Writer\XLSX\Manager\SharedStringsManager;
use OpenSpout\Writer\XLSX\Manager\Style\StyleManager;
use OpenSpout\Writer\XLSX\Manager\Style\StyleRegistry;
use OpenSpout\Writer\XLSX\Manager\WorkbookManager;
use OpenSpout\Writer\XLSX\Manager\WorksheetManager;

final class Writer extends AbstractWriterMultiSheets
{
    /** @var string Content-Type value for the header */
    protected static string $headerContentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

    private Options $options;

    public function __construct(?Options $options = null)
    {
        $this->options = $options ?? new Options();
    }

    protected function createWorkbookManager(): WorkbookManager
    {
        $workbook = new Workbook();

        $fileSystemHelper = new FileSystemHelper(
            $this->options->getTempFolder(),
            new ZipHelper(),
            new XLSX()
        );
        $fileSystemHelper->createBaseFilesAndFolders();

        $xlFolder = $fileSystemHelper->getXlFolder();
        $sharedStringsManager = new SharedStringsManager($xlFolder, new XLSX());

        $styleMerger = new StyleMerger();
        $styleManager = new StyleManager(new StyleRegistry($this->options->DEFAULT_ROW_STYLE));

        $worksheetManager = new WorksheetManager(
            $this->options,
            $styleManager,
            $styleMerger,
            $sharedStringsManager,
            new XLSX(),
            StringHelper::factory()
        );

        return new WorkbookManager(
            $workbook,
            $this->options,
            $worksheetManager,
            $styleManager,
            $styleMerger,
            $fileSystemHelper
        );
    }
}
