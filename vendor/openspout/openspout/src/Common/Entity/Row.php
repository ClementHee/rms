<?php

declare(strict_types=1);

namespace OpenSpout\Common\Entity;

use OpenSpout\Common\Entity\Style\Style;

final class Row
{
    /**
     * The cells in this row.
     *
     * @var Cell[]
     */
    private array $cells = [];

    /** The row style. */
    private Style $style;

    /**
     * Row constructor.
     *
     * @param Cell[] $cells
     */
    public function __construct(array $cells, ?Style $style = null)
    {
        $this
            ->setCells($cells)
            ->setStyle($style)
        ;
    }

    /**
     * @param mixed[] $cellValues
     */
    public static function fromValues(array $cellValues = [], ?Style $rowStyle = null): self
    {
        $cells = array_map(static function (mixed $cellValue): Cell {
            return Cell::fromValue($cellValue);
        }, $cellValues);

        return new self($cells, $rowStyle);
    }

    /**
     * @return Cell[] $cells
     */
    public function getCells(): array
    {
        return $this->cells;
    }

    /**
     * @param Cell[] $cells
     */
    public function setCells(array $cells): self
    {
        $this->cells = [];
        foreach ($cells as $cell) {
            $this->addCell($cell);
        }

        return $this;
    }

    public function setCellAtIndex(Cell $cell, int $cellIndex): self
    {
        $this->cells[$cellIndex] = $cell;

        return $this;
    }

    public function getCellAtIndex(int $cellIndex): ?Cell
    {
        return $this->cells[$cellIndex] ?? null;
    }

    public function addCell(Cell $cell): self
    {
        $this->cells[] = $cell;

        return $this;
    }

    public function getNumCells(): int
    {
        // When using "setCellAtIndex", it's possible to
        // have "$this->cells" contain holes.
        if ([] === $this->cells) {
            return 0;
        }

        return max(array_keys($this->cells)) + 1;
    }

    public function getStyle(): Style
    {
        return $this->style;
    }

    public function setStyle(?Style $style): self
    {
        $this->style = $style ?? new Style();

        return $this;
    }

    /**
     * @internal
     *
     * @return mixed[] The row values, as array
     */
    public function toArray(): array
    {
        return array_map(static function (Cell $cell): mixed {
            return $cell->getValue();
        }, $this->cells);
    }

    /**
     * Detect whether a row is considered empty.
     * An empty row has all of its cells empty.
     */
    public function isEmpty(): bool
    {
        foreach ($this->cells as $cell) {
            if (!$cell instanceof Cell\EmptyCell) {
                return false;
            }
        }

        return true;
    }
}
