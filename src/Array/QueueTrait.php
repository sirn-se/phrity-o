<?php

namespace Phrity\O\Array;

/**
 * Phrity\O\Array\QueueTrait trait.
 */
trait QueueTrait
{
    use TypeTrait;

    /**
     * Add item to the end of queue.
     * @param mixed $item Item to add.
     */
    public function enqueue(mixed $item): void
    {
        $this->{$this->o_source_ref}[] = $item;
    }

    /**
     * Retrieve item from queue.
     * @return mixed $item Get and remove first item in queue.
     */
    public function dequeue(): mixed
    {
        return array_shift($this->{$this->o_source_ref});
    }
}
