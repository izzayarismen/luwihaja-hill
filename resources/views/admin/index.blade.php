@extends('layouts.admin')

@section('title', 'eCommerce Dashboard | TailAdmin')

@section('content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div x-data="{ pageName: 'Dashboard' }">
            <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                <h2     class="text-xl font-semibold text-gray-800 dark:text-white/90"     x-text="pageName"  ></h2>

                <nav>
                    <ol class="flex items-center gap-1.5">
                        <li>
                            <a
                                class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                                href="{{ url('/') }}"        >
                                Home
                                <svg             class="stroke-current"             width="17"
                                    height="16"             viewBox="0 0 17 16"             fill="none"
                                    xmlns="http://www.w3.org/2000/svg"          >

                                    <path               d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366"
                                        stroke=""               stroke-width="1.2"               stroke-linecap="round"
                                        stroke-linejoin="round"             />

                                </svg>
                                </a>
                            </li>
                        <li         class="text-sm text-gray-800 dark:text-white/90"         x-text="pageName"      >
                        </li>
                        </ol>
                    </nav>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-4 md:gap-6">
            <div class="col-span-12 space-y-6">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6">
                    <div
                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
                        >
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 dark:bg-purple-500/15"
                            >
                            <svg         class="fill-purple-600 dark:fill-purple-500"         width="24"
                                height="24"         viewBox="0 0 24 24"         fill="none"
                                xmlns="http://www.w3.org/2000/svg"      >

                                <path           fill-rule="evenodd"           clip-rule="evenodd"
                                    d="M8.80443 5.60156C7.59109 5.60156 6.60749 6.58517 6.60749 7.79851C6.60749 9.01185 7.59109 9.99545 8.80443 9.99545C10.0178 9.99545 11.0014 9.01185 11.0014 7.79851C11.0014 6.58517 10.0178 5.60156 8.80443 5.60156ZM5.10749 7.79851C5.10749 5.75674 6.76267 4.10156 8.80443 4.10156C10.8462 4.10156 12.5014 5.75674 12.5014 7.79851C12.5014 9.84027 10.8462 11.4955 8.80443 11.4955C6.76267 11.4955 5.10749 9.84027 5.10749 7.79851ZM4.86252 15.3208C4.08769 16.0881 3.70377 17.0608 3.51705 17.8611C3.48384 18.0034 3.5211 18.1175 3.60712 18.2112C3.70161 18.3141 3.86659 18.3987 4.07591 18.3987H13.4249C13.6343 18.3987 13.7992 18.3141 13.8937 18.2112C13.9797 18.1175 14.017 18.0034 13.9838 17.8611C13.7971 17.0608 13.4132 16.0881 12.6383 15.3208C11.8821 14.572 10.6899 13.955 8.75042 13.955C6.81096 13.955 5.61877 14.572 4.86252 15.3208ZM3.8071 14.2549C4.87163 13.2009 6.45602 12.455 8.75042 12.455C11.0448 12.455 12.6292 13.2009 13.6937 14.2549C14.7397 15.2906 15.2207 16.5607 15.4446 17.5202C15.7658 18.8971 14.6071 19.8987 13.4249 19.8987H4.07591C2.89369 19.8987 1.73504 18.8971 2.05628 17.5202C2.28015 16.5607 2.76117 15.2906 3.8071 14.2549ZM15.3042 11.4955C14.4702 11.4955 13.7006 11.2193 13.0821 10.7533C13.3742 10.3314 13.6054 9.86419 13.7632 9.36432C14.1597 9.75463 14.7039 9.99545 15.3042 9.99545C16.5176 9.99545 17.5012 9.01185 17.5012 7.79851C17.5012 6.58517 16.5176 5.60156 15.3042 5.60156C14.7039 5.60156 14.1597 5.84239 13.7632 6.23271C13.6054 5.73284 13.3741 5.26561 13.082 4.84371C13.7006 4.37777 14.4702 4.10156 15.3042 4.10156C17.346 4.10156 19.0012 5.75674 19.0012 7.79851C19.0012 9.84027 17.346 11.4955 15.3042 11.4955ZM19.9248 19.8987H16.3901C16.7014 19.4736 16.9159 18.969 16.9827 18.3987H19.9248C20.1341 18.3987 20.2991 18.3141 20.3936 18.2112C20.4796 18.1175 20.5169 18.0034 20.4837 17.861C20.2969 17.0607 19.913 16.088 19.1382 15.3208C18.4047 14.5945 17.261 13.9921 15.4231 13.9566C15.2232 13.6945 14.9995 13.437 14.7491 13.1891C14.5144 12.9566 14.262 12.7384 13.9916 12.5362C14.3853 12.4831 14.8044 12.4549 15.2503 12.4549C17.5447 12.4549 19.1291 13.2008 20.1936 14.2549C21.2395 15.2906 21.7206 16.5607 21.9444 17.5202C22.2657 18.8971 21.107 19.8987 19.9248 19.8987Z"
                                    fill=""         />

                            </svg>
                            </div>

                        <div class="mt-5 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 dark:text-gray-400"          >Total Akun</span
                                    >
                                <h4           class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                                    >
                                    2
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <div
                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
                        >
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 dark:bg-yellow-500/15"
                            >
                            <svg         class="fill-yellow-600 dark:fill-yellow-500"         width="24"
                                height="24"         viewBox="0 0 24 24"         fill="none"
                                xmlns="http://www.w3.org/2000/svg"      >

                                <path           fill-rule="evenodd"           clip-rule="evenodd"
                                    d="M11.665 3.75621C11.8762 3.65064 12.1247 3.65064 12.3358 3.75621L18.7807 6.97856L12.3358 10.2009C12.1247 10.3065 11.8762 10.3065 11.665 10.2009L5.22014 6.97856L11.665 3.75621ZM4.29297 8.19203V16.0946C4.29297 16.3787 4.45347 16.6384 4.70757 16.7654L11.25 20.0366V11.6513C11.1631 11.6205 11.0777 11.5843 10.9942 11.5426L4.29297 8.19203ZM12.75 20.037L19.2933 16.7654C19.5474 16.6384 19.7079 16.3787 19.7079 16.0946V8.19202L13.0066 11.5426C12.9229 11.5844 12.8372 11.6208 12.75 11.6516V20.037ZM13.0066 2.41456C12.3732 2.09786 11.6277 2.09786 10.9942 2.41456L4.03676 5.89319C3.27449 6.27432 2.79297 7.05342 2.79297 7.90566V16.0946C2.79297 16.9469 3.27448 17.726 4.03676 18.1071L10.9942 21.5857L11.3296 20.9149L10.9942 21.5857C11.6277 21.9024 12.3732 21.9024 13.0066 21.5857L19.9641 18.1071C20.7264 17.726 21.2079 16.9469 21.2079 16.0946V7.90566C21.2079 7.05342 20.7264 6.27432 19.9641 5.89319L13.0066 2.41456Z"
                                    fill=""         />

                            </svg>
                            </div>

                        <div class="mt-5 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 dark:text-gray-400"          >Total Kamar</span
                                    >
                                <h4           class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                                    >
                                    10
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <div
                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
                        e>
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 dark:bg-green-500/15"
                            >
                            <svg         class="fill-green-600 dark:fill-green-500"         width="24"
                                height="24"         viewBox="0 0 24 24"         fill="none"
                                xmlns="http://www.w3.org/2000/svg"      >

                                <path           fill-rule="evenodd"           clip-rule="evenodd"
                                    d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                    fill="currentColor"         />

                            </svg>
                            </div>

                        <div class="mt-5 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 dark:text-gray-400"          >Total Booking</span
                                    >
                                <h4           class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                                    >
                                    0
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <div
                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6"
                        >
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-100 dark:bg-red-500/15"    >
                            <svg         class="fill-red-600 dark:fill-red-500"     G     width="24"
                                height="24"         viewBox="0 0 24 24"         fill="none"
                                xmlns="http://www.w3.org/2000/svg"      >

                                <path           fill-rule="evenodd"           clip-rule="evenodd"
                                    d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM3.5 12C3.5 7.30558 7.30558 3.5 12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C7.30558 20.5 3.5 16.6944 3.5 12ZM12 6.5C12.4142 6.5 12.75 6.83579 12.75 7.25V11.5858L15.6893 14.5251C15.9822 14.818 15.9822 15.2929 15.6893 15.5858C15.3964 15.8787 14.9216 15.8787 14.6287 15.5858L11.4393 12.3964C11.3536 12.3107 11.25 12.185 11.25 12.0488V7.25C11.25 6.83579 11.5858 6.5 12 6.5Z"
                                    fill="currentColor"         />

                            </svg>
                            </div>

                        <div class="mt-5 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 dark:text-gray-400"          >Belum
                                    Diverifikasi</span        >
                                <h4           class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                                    >
                                    0
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
    </div>
@endsection
