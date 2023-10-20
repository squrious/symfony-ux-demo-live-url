<?php

namespace App\Twig\Components;

use App\Dto\User;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent()]
final class SearchBox
{
    #[LiveProp(writable: true, url: true)]
    public ?string $search = null;

    #[LiveProp(writable: ['id', 'name'], url: true)]
    public ?User $user = null;

    /**
     * @var string[]
     */
    #[LiveProp(url: true)]
    public array $tags = [
        'a',
        'b'
    ];

    #[LiveProp(writable: true, onUpdated: 'onNewTag')]
    public ?string $newTag = null;

    public function mount(): void
    {
        if (null === $this->user) {
            $this->user = new User();
            $this->user->name = 'George';
        }
    }

    #[LiveAction]
    public function removeTag(#[LiveArg] string $tag): void
    {
        $index = array_search($tag, $this->tags);
        if (false !== $index) {
            \array_splice($this->tags, $index, 1);
        }
    }

    public function onNewTag(): void
    {
        if (null !== $this->newTag) {
            if (!\in_array($this->newTag, $this->tags)) {
                $this->tags[] = $this->newTag;
            }
            $this->newTag = null;
        }
    }


    use DefaultActionTrait;
}
