<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Medical History') }}
        </h2>
    </x-slot>

    <div class="mt-10"></div>
    <div class="flex justify-center items-center">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            @foreach ($result['medical_history'] as $medical_history)
                <div class="bg-white shadow-md overflow-hidden rounded-lg hover:bg-red-100 transition-all duration-300 ease-in-out">
                    <div class="p-3 text-gray-900">
                        <table class="table table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td>{{ $medical_history->first_name }} {{ $medical_history->last_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Gender:</strong></td>
                                    <td>{{ $medical_history->gender }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Birthdate:</strong></td>
                                    <td>{{ $medical_history->birthdate }}</td>
                                </tr>
                                <tr>
                                    <td><strong> Acquired Respiratory Distress Syndrome:</strong></td>
                                    <td>{{ $medical_history->ards }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Anxiety/ Panic Attack?:</strong></td>
                                    <td>{{ $medical_history->anxpan }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Arthritis:</strong></td>
                                    <td>{{ $medical_history->arthritis }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Asthma:</strong></td>
                                    <td>{{ $medical_history->asthma }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Depression:</strong></td>
                                    <td>{{ $medical_history->depress }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Diabetes:</strong></td>
                                    <td>{{ $medical_history->diabetes }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Heartattack:</strong></td>
                                    <td>{{ $medical_history->heartatk }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Stroke:</strong></td>
                                    <td>{{ $medical_history->stroke }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Visual Impairment:</strong></td>
                                    <td>{{ $medical_history->visualimp }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Allergies:</strong></td>
                                    <td>{{ $medical_history->allergies }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Epilepsy:</strong></td>
                                    <td>{{ $medical_history->epilepsy }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Hepatitis:</strong></td>
                                    <td>{{ $medical_history->hepatitis }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Metal Implant:</strong></td>
                                    <td>{{ $medical_history->metalimp }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tuberculosis:</strong></td>
                                    <td>{{ $medical_history->tuberculosis }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Sexual Dysfunction:</strong></td>
                                    <td>{{ $medical_history->sexdys }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Pregnant:</strong></td>
                                    <td>{{ $medical_history->pregnancy }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Others:</strong></td>
                                    <td>{{ $medical_history->others }}</td>
                                </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
