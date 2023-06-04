<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }} 
                     <div class="fs-6" style="color:rgb(211, 86, 86)">Welcome,{{ Auth::user()->name }}</div> 
                    
                </div>
            </div>
        </div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">


                {{-- image  --}}
                <div class="card mt-3">
                    <div class="row mt-3">
                        <div class="col mt-2 mx-4">

                            <div class="fs-1" style="color: rgb(11, 11, 11)">
                                Date & Time: {{ $formattedDateTime }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="container mt-2">

                                <table style=" border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Sun</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($week = 0; $week < 6; $week++)
                                            <tr>
                                                @for ($day = 0; $day < 7; $day++)
                                                    <td style="width: 30px;height: 30px;text-align: center; vertical-align: middle;"
                                                        @if ($today->format('j') == $dayOfWeek && $today->format('W') == $weekNumber) class="today" @endif>
                                                        @if ($week == 0 && $dayOfWeek > $day)
                                                            &nbsp;
                                                        @else
                                                            {{ $dayOfMonth }}
                                                            @php
                                                                $dayOfMonth++;
                                                                if ($dayOfMonth > $daysInMonth) {
                                                                    break 2;
                                                                }
                                                            @endphp
                                                        @endif
                                                    </td>
                                                @endfor
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                

            </div>
        </div>
    </div>
</x-app-layout>
