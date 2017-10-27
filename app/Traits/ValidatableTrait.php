<?php

namespace App\Traits;

use Exception;

trait ValidatableTrait
{
    /**
     * Get the rules parsed
     * @param  string $action
     * @param  $item
     * @return string
     */
    public function validation($action, $item = null)
    {
        if (!isset($this->rules[$action])) {
            throw (new Exception("There are no rules for the given action"))
            ->setAction($action);
        }
        return $this->rulize($this->rules[$action], $item);
    }

    /**
     * Validate by rules
     * @param  array $rules
     * @return array
     */
    public  function rulize(array $rules, $object)
    {
        return array_map(function ($rule) use ($object) {
            return preg_replace_callback('/{(\w+)}/', function ($matches) use ($rule, $object) {
                if (!isset($matches[1])) {
                    throw (new Exception())
                    ->setAttribute($rule)
                    ->setItem($object);
                }
                return $object->{$matches[1]};
            }, $rule);
        }, $rules);
    }
}
