<?php


namespace App\Common\Bases;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BaseRequest
 * @package App\Common\Bases
 */
abstract class BaseRequest extends FormRequest
{

    /**
     * @return array
     */
    abstract protected function rules(): array;

    /**
     * @param string $glue
     * @param array $list
     * @return string
     */
    public function implode(string $glue = ',', array $list = []): string
    {
        return implode($glue, $list);
    }

    public function validationData(): array
    {
        return array_merge($this->route()?->parameters() ?? [], $this->all());
    }
}
