<?= '<?php' ?>
<?= "\n\n" ?>
namespace {{ $request_namespace }};

use App\Http\Requests\RB_Request;

class {{ $request_name }} extends RB_Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
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
