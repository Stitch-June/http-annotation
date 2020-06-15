<?php


namespace EasySwoole\HttpAnnotation\AnnotationTag;


use EasySwoole\Annotation\AbstractAnnotationTag;
use EasySwoole\HttpAnnotation\Exception\Annotation\InvalidTag;

/**
 * Class Di
 * @package EasySwoole\HttpAnnotation\AnnotationTag
 * @Annotation
 */
class Di extends AbstractAnnotationTag
{

    /**
     * @var string
     */
    public $key;

    public function tagName(): string
    {
        return 'Di';
    }

    public function aliasMap(): array
    {
        return [static::class];
    }

    public function assetValue(?string $raw)
    {
        parse_str($raw,$str);
        if(!empty($str['key'])){
            $this->key = trim($str['key']," \t\n\r\0\x0B\"'");
        }
        if(empty($this->key)){
            throw new InvalidTag("Di key is required");
        }
    }
}