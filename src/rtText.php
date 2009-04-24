<?php

/**
 * rtText reads named texts from texts/ subdirectory.
 */
class rtText
{
    /**
     * Get a named text from texts/ subdirectory.
     *
     * @param string $name Text name to return
     * @return string
     */
    public static function get($name)
    {
        $filename = dirname(__FILE__) . '/texts/' . $name . '.txt';

        if (!file_exists($filename)) {
            throw new LogicException('The text ' . $name . ' does not exist');
        }

        return file_get_contents($filename);
    }
}
?>
