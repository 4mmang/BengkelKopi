<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar with Toggle and Separated Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body{
            font-family: 'Inter', sans-serif;
        }

        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }

        .hidden-sidebar {
            transform: translateX(-100%);
        }

        #example_filter {
            margin-bottom: 12px;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="flex h-screen">
    <!-- Sidebar -->
    <div id="sidebar"
        class="fixed inset-y-0 left-0 w-64 bg-black border-r z-50 border-gray-200 p-4 sidebar-transition hidden-sidebar md:static md:transform-none">
        <!-- <span class="grid h-10 w-32 place-content-center rounded-lg bg-gray-100 text-xs text-gray-600">
            Logo
        </span> -->
        <div class="flex justify-center">
            <span class="grid h-10 place-content-center rounded-lg bg-black text-xl text-white px-3">
                BengkelKopi
            </span>
        </div>

        <ul id="sidebar-menu" class="mt-6 space-y-1">
            <li>
                <a href="#" class="block rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="pesanan/index.php"
                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                    <i class="fas fa-coffee mr-2"></i> Pesanan
                </a>
            </li>
            <li>
                <a href="menu/index.php"
                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                    <i class="fas fa-coffee mr-2"></i> Menu
                </a>
            </li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Navbar di atas konten utama -->
        <nav class="bg-white p-4 sticky top-0 z-10">
            <div class="flex justify-between items-center">
                <div class="text-lg font-semibold md:hidden">
                    <a href="../index.php" class="">BengkelKopi</a>
                </div>
                <!-- Tombol toggle sidebar -->
                <button id="menu-btn" class="p-2 rounded-lg text-black md:hidden">
                    <i class="fas fa-bars text-2xl"></i>
                </button>

                <!-- Menu navigasi untuk desktop -->
                <ul class="hidden md:flex space-x-4 ml-auto">
                    <div class="relative">
                        <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                            <a href="#"
                                class="border-e px-4 py-2 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                Edit
                            </a>

                            <button id="dropdown-btn"
                                class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                <span class="sr-only">Menu</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div id="dropdown-menu"
                            class="absolute end-0 z-10 mt-2 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg hidden"
                            role="menu">
                            <div class="p-2">
                                <a href="#"
                                    class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                    role="menuitem">
                                    View on Storefront
                                </a>

                                <a href="#"
                                    class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                    role="menuitem">
                                    View Warehouse Info
                                </a>

                                <a href="#"
                                    class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                    role="menuitem">
                                    Duplicate Product
                                </a>

                                <a href="#"
                                    class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                    role="menuitem">
                                    Unpublish Product
                                </a>
                            </div>

                            <div class="p-2">
                                <form method="POST" action="#">
                                    <button type="submit"
                                        class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
                                        role="menuitem">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>

                                        Delete Product
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>

        <!-- Isi konten -->
        <div class="flex-1 p-6 bg-gray-100 overflow-y-auto">
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <p>This is the main content area. The sidebar is separate and the navbar stays on top of the content area
                only.
            </p>

            <div class="container">
            </div>

            <!-- Modal Script -->
            <script>
                const modal = document.getElementById('modal');
                const openModalBtn = document.getElementById('openModal');
                const closeModalBtn = document.getElementById('closeModal');

                openModalBtn.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                });

                closeModalBtn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });

                // Optional: Close modal when clicking outside modal content
                window.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            </script>


            <!-- pop up start -->
            <div id="pop-up" class="rounded-2xl mt-3 hidden border border-blue-100 bg-white p-4 shadow-lg sm:p-6 lg:p-8"
                role="alert">
                <div class="flex items-center gap-4">
                    <span class="shrink-0 rounded-full bg-blue-400 p-2 text-white">
                        <svg class="size-4" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                                fill-rule="evenodd" />
                        </svg>
                    </span>

                    <p class="font-medium sm:text-lg">New message!</p>
                </div>

                <p class="mt-4 text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam ea quo unde vel adipisci
                    blanditiis voluptates eum. Nam, cum minima?
                </p>

                <div class="mt-6 sm:flex sm:gap-4">
                    <a class="inline-block w-full rounded-lg bg-blue-500 px-5 py-3 text-center text-sm font-semibold text-white sm:w-auto"
                        href="#">
                        Take a Look
                    </a>

                    <a class="mt-2 inline-block w-full rounded-lg bg-gray-50 px-5 py-3 text-center text-sm font-semibold text-gray-500 sm:mt-0 sm:w-auto"
                        href="#">
                        Mark as Read
                    </a>
                </div>
            </div>
            <!-- pop up end -->

            <div class="overflow-x-auto mt-4">
                <table id="example" class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm mt-4">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date of Birth</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Role</th>
                            <th class="whitespace-neowrap px-4 py-2 font-medium text-gray-900">Salary</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">John Doe</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Web Developer</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">$120,000</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="#"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Jane Doe</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">04/11/1980</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Web Designer</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">$100,000</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="#"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gary Barlow</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Singer</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">$20,000</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="#"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gary Barlow</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Singer</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">$20,000</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="#"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gary Barlow</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Singer</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">$20,000</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="#"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gary Barlow</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Singer</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">$20,000</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="#"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gary Barlow</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Singer</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">$20,000</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="#"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gary Barlow</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Singer</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">$20,000</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="#"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gary Barlow</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Singer</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">$20,000</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="#"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Script untuk toggle sidebar dan menambahkan menu
        const menuBtn = document.getElementById('menu-btn');
        const sidebar = document.getElementById('sidebar');
        const sidebarMenu = document.getElementById('sidebar-menu');

        // Menu baru
        const newMenuItem = document.createElement('li');
        newMenuItem.innerHTML =
            `<a href="#" class="block rounded-lg px-4 py-2 text-sm md:hidden lg:hidden xl:hidden font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"><i class="fas fa-sign-out-alt mr-2"></i> Keluar</a>`;

        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden-sidebar');

            if (sidebar.classList.contains('hidden-sidebar')) {
                sidebarMenu.removeChild(newMenuItem);
            } else {
                sidebarMenu.appendChild(newMenuItem);
            }
        });

        const btnDownload = document.getElementById('download')
        const popUp = document.getElementById('pop-up')
        btnDownload.addEventListener('click', function () {
            popUp.classList.toggle('hidden')
        })
    </script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>

</html>