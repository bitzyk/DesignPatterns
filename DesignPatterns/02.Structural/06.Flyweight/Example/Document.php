<?php

/**
 * The Document acts as the client, rendering the characters in the appropriate format.
 *
 */
class Document
{
    private array $characters = [];

    public function addChrs(
        string $chrs,
        TextFormatFlyweightInterface $format
    ): void {
        $this->characters[] = [
            'chrs' => $chrs,
            'format' => $format
        ];
    }

    public function render(): void {
        $renderedOutput = '';

        foreach ($this->characters as $chrRow) {
            /** @var TextFormatFlyweightInterface $format */
            $format = $chrRow['format'];
            $renderedOutput .= $format->render($chrRow['chrs']) . PHP_EOL;
        }

        echo $renderedOutput;
    }
}
