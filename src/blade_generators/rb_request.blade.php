<?= '<?php' ?>
<?= "\n\n" ?>
namespace {{ $request_namespace }};

use {{ $request_namespace }}\RbRequest;

class {{ $request_name }} extends RBRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return {{ $is_authorize }};
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
