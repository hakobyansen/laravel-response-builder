<?= '<?php' ?>
<?= "\n\n" ?>
namespace {{ $request_namespace }};

class {{ $request_name }} extends {{ $parent_request_namespace }}
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
		];
	}
}
