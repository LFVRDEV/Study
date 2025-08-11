<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'p_surname' => 'required|string|max:100',
            'm_surname' => 'required|string|max:100',
            'curp' => 'required|string|max:20|unique:t_employees',
            'rfc' => 'required|string|max:16|unique:t_employees',
            'nss' => 'required|string|max:20|unique:t_employees',
            'birthday' => 'nullable|date|date_format: Y-m-d',
            'email_p' => 'nullable|email',
            'phone_p' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:100',
            'locality' => 'nullable|string|max:100',
            'zip' => 'nullable|string|max:5',
            'town_id' => 'nullable|exist:c_towns',
            'state_id' => 'nullable|exist:c_towns',
            'contact_em' => 'nullable|string|max:100',
            'phone_em' => 'nullable|string|max:10',
            'relation_em' => 'nullable|string|max:100',
            'company_id' => 'nullable|exist:c_companies',
            'payroll_id' => 'nullable|exist:c_payrolls',
            'department_id' => 'nullable|exist:c_departments',
            'branch_id' => 'nullable|exist:c_branches',
            'position_id' => 'nullable|exist:c_positions',
            'hiring_date' => 'nullable|date|date_format: Y-m-d',
            'm_salary' => 'nullable|double|numeric:strict',
            'd_salary' => 'nullable|double|numeric:strict',
            'phone_ent' => 'nullable|string|max:10',
            'email_ent' => 'nullable|email',
            'bank_id' => 'nullable|exist:c_banks',
            'account_number' => 'nullable|string|max:100|unique:t_empleados',
            'account_key' => 'nullable|string|max:100|unique:t_empleados',
            'term_date' => 'nullable|date|date_format: Y-m-d',
            'term_reason' => 'nullable|string',
            'return_date' => 'nullable|date|date_format: Y-m-d'
        ];
    }

    public function messages() : array {
        return [
            'name.required' => 'Nombre es obligatorio',
            'name.max' => 'Nombre no puede tener mas de 100 caracteres',
            'p_surname.required' => 'Apellido Paterno es obligatorio',
            'p_surname.max' => 'Apellido Paterno no puede tener mas de 100 caracteres',
            'm_surname.required' => 'Apellido Materno es obligatorio',
            'm_surname.max' => 'Apellido Materno no puede tener mas de 100 caracteres',
            'curp.required' => 'CURP es obligatorio',
            'curp.max' => 'CURP no puede tener mas de 20 caracteres',
            'curp.unique' => 'CURP ya se encuentra registrado',
            'rfc.required' => 'RFC es obligatorio',
            'rfc.max' => 'RFC no puede tener mas de 16 caracteres',
            'rfc.unique' => 'RFC ya se encuentra registrado',
            'nss.required' => 'NSS es obligatorio',
            'nss.max' => 'NSS no puede tener mas de 16 caracteres',
            'nss.unique' => 'NSS ya se encuentra registrado',
            'birthday.date' => 'Fecha de nacimiento debe ser de tipo fecha',
            'birthday.date_format' => 'Fecha de nacimiento tiene un formato de fecha incorrecto',
            'email_p.email' => 'Correo electronico personal contiene un formato incorrecto',
            'phone_p.max' => 'Número telefónico personal contiene más de 10 carácteres',
            'address.max' => 'Número telefónico personal contiene más de 100 carácteres',
            'locality.max' => 'Número telefónico personal contiene más de 100 carácteres',
            'zip.max' => 'Número telefónico personal contiene más de 5 carácteres',
            'town_id.exist' => 'Alcaldía o Municipio no existe',
            'state_id.exist' => 'Estado no existe',
            'contact_em.max' => 'Contacto de emergencia contiene más de 100 carácteres',
            'phone_em.max' => 'Telefóno de emergencia contiene más de 10 carácteres',
            'relation_em.max' => 'Parentesco contiene más de 100 carácteres',
            'company_id.exist' => 'Compañia no existe',
            'payroll_id.exist' => 'Nómina no existe',
            'department_id.exist' => 'Departamento no existe',
            'branch_id.exist' => 'Sucursal no existe',
            'position_id.exist' => 'Puesto no existe',
            'hiring_date.date' => 'Fecha de contratación debe ser de tipo fecha',
            'hiring_date.date_format' => 'Fecha de contratación tiene un formato de fecha incorrecto',
            'm_salary.double' => 'Salario mensual debe ser numerico',
            'm_salary.numeric' => 'Salario mensual debe ser numerico',
            'd_salary.double' => 'Salario diario debe ser numerico',
            'd_salary.numeric' => 'Salario diario debe ser numerico',
            'phone_ent.string' => 'Número telefónico empresarial contiene un formato incorrecto',
            'phone_ent.max' => 'Número telefónico empresarial contiene más de 10 caracteres',
            'email_ent.email' => 'Correo electronico empresarial contiene un formato incorrecto',
            'bank_id.exist' => 'Banco no existe',
            'account_number.string' => 'Número de cuenta con formato incorrecto',
            'account_number.max' => 'Número de cuenta contiene más de 100 caracteres',
            'account_number.unique' => 'Número de cuenta ya se encuentra registrado',
            'account_key.string' => 'Cuenta clabe con formato incorrecto',
            'account_key.max' => 'Cuenta clabe contiene más de 100 caracteres',
            'account_key.unique' => 'Cuenta clabe ya se encuentra registrado',
            'term_date.date' => 'Fecha de baja no es una fecha válida',
            'term_date.date_format' => 'Fecha de baja con formato incorrecto',
            'term_reason.string' => 'Razón de baja incorrecta',
            'return_date.date' => 'Fecha de reingreso no es una fecha válida',
            'return_date.date_format' => 'Fecha de reingreso con formato incorrecto'
        ];
    }
}
