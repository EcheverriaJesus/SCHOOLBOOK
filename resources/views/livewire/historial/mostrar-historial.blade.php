<x-app-layout>
    <div class="my-5">
        <h1 class="text-2xl font-extrabold text-indigo-600">Avance Reticular</h1>
        <p class="my-2">Visualiza las materias que has cursado, que estas cursando y que vas a cursar.</p>
    </div>
   


    <div class="flex-col w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
        <h1 class="flex justify-center text-2xl font-extrabold text-indigo-600">Primer Año</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
        <thead class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Materia
                </th>
                <th scope="col" class="px-6 py-3">
                    Primer perdiodo
                </th>
                <th scope="col" class="px-6 py-3">
                    Segundo periodo
                </th>
                <th scope="col" class="px-6 py-3">
                    Tercer Periodo
                </th>
                <th scope="col" class="px-6 py-3">
                    Calificacion Final
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Español I
                </th>
                <td class="px-6 py-4">
                    8.5
                </td>
                <td class="px-6 py-4">
                    9.0
                </td>
                <td class="px-6 py-4">
                    10
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Geografia
                </th>
                <td class="px-6 py-4">
                    7.7
                </td>
                <td class="px-6 py-4">
                    8.8
                </td>
                <td class="px-6 py-4">
                    9.5
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Matematicas I
                </th>
                <td class="px-6 py-4">
                    8.7
                </td>
                <td class="px-6 py-4">
                9.2
                </td>
                <td class="px-6 py-4">
                    8.4
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

    </div>
</x-app-layout>