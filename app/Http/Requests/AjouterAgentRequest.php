<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjouterAgentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomAgent' => 'required|min:5',
            'prenomAgent' => 'required|min:5',
            'sexeAgent' => 'required',
            'type_agents_id'  => 'required|integer',
            'etat_id' => 'required|integer',
            'dateNaisAgent' => 'required',
            'lieuNaisAgent' => 'required',
            'sitMatAgent' => 'required',
            'nationAgent' => 'required',
            'ethnieAgent' => 'required',
            'villageOrigineAgent' => 'required',
            'prefectureAgent' => 'required',
            'religionAgent' => 'required',
            'groupeSangAgent' => 'required',
            'rhesusAgent' => 'required',
            'dateEmbauche' => 'required',
            'numDecision' => 'required',
            'dateDecision' => 'required',
            'numCNSS' => 'required',
            'numAllocation' => 'required',
            'langue' => 'required',
            'loisir' => 'required|min:5',
            'dateRetraite' => 'required',
            'dateBapteme' => 'required',
            'pasteurBapteme' => 'required|min:5',
            'dateConfirmtion' => 'required',
            'lieuConfirmation' => 'required|min:5',
            'pasteurConfirm' => 'required|min:5',
            'nomParain' => 'required|min:5',
            'nomMarraine' => 'required|min:5',
            'photoAgent' => 'sometimes|image|max:5000',
            'quartier' => 'required|min:4',
            'rue' => 'required|min:5',
            'ville' => 'required',
            'tel' => 'required',
            'email' => 'required|email',

        ];
    }
}
