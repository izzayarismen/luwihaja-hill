<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Produk | TailAdmin - Tailwind CSS Admin Dashboard Template</title>
  <link rel="icon" href="favicon.ico"><link href="/css/admin/style.css" rel="stylesheet"></head>
  <body
    x-data="productPageData()"
    x-init="
        darkMode = JSON.parse(localStorage.getItem('darkMode'));
        $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}"
  >
    <div
  x-show="loaded"
  x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 500)})"
  class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black"
>
  <div
    class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-brand-500 border-t-transparent"
  ></div>
</div>

    <div class="flex h-screen overflow-hidden">
      <aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
>
  <!-- SIDEBAR HEADER -->
  <div
    :class="sidebarToggle ? 'justify-center' : 'justify-between'"
    class="flex items-center gap-2 pt-8 sidebar-header pb-7"
  >
    <a href="index.html">
      <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
        <img class="dark:hidden" src="src/images/logo/logo.png" alt="Logo" />
        <img
          class="hidden dark:block"
          src="src/images/logo/logo.png"
          alt="Logo"
        />
      </span>

      <img
        class="logo-icon"
        :class="sidebarToggle ? 'lg:block' : 'hidden'"
        src="src/images/logo/logo-icon.png" alt="Logo"
      />
    </a>
  </div>
  <!-- SIDEBAR HEADER -->

  <div
    class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar"
  >
    <!-- Sidebar Menu -->
    <nav x-data="{selected: $persist('Dashboard')}">
      <!-- Menu Group -->
      <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
          <span
            class="menu-group-title"
            :class="sidebarToggle ? 'lg:hidden' : ''"
          >
            MENU
          </span>

          <svg
            :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
            class="mx-auto fill-current menu-group-icon"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
              fill=""
            />
          </svg>
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
          <!-- Menu Item Dashboard -->
          <li>
            <a
              href="index.html"
              class="menu-item group"
              :class="page === 'ecommerce' ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="page === 'ecommerce' ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                  fill=""
                />
              </svg>

              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Dashboard
              </span>

              </a>

            </li>
          <!-- Menu Item Dashboard -->
          <!-- Menu Item Ui Elements -->
          <li>
            <a
              href="videos.html"
              class="menu-item group"
              :class="page === 'videos' ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="page === 'videos' ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M11.665 3.75618C11.8762 3.65061 12.1247 3.65061 12.3358 3.75618L18.7807 6.97853L12.3358 10.2009C12.1247 10.3064 11.8762 10.3064 11.665 10.2009L5.22014 6.97853L11.665 3.75618ZM4.29297 8.19199V16.0946C4.29297 16.3787 4.45347 16.6384 4.70757 16.7654L11.25 20.0365V11.6512C11.1631 11.6205 11.0777 11.5843 10.9942 11.5425L4.29297 8.19199ZM12.75 20.037L19.2933 16.7654C19.5474 16.6384 19.7079 16.3787 19.7079 16.0946V8.19199L13.0066 11.5425C12.9229 11.5844 12.8372 11.6207 12.75 11.6515V20.037ZM13.0066 2.41453C12.3732 2.09783 11.6277 2.09783 10.9942 2.41453L4.03676 5.89316C3.27449 6.27429 2.79297 7.05339 2.79297 7.90563V16.0946C2.79297 16.9468 3.27448 17.7259 4.03676 18.1071L10.9942 21.5857L11.3296 20.9149L10.9942 21.5857C11.6277 21.9024 12.3732 21.9024 13.0066 21.5857L19.9641 18.1071C20.7264 17.7259 21.2079 16.9468 21.2079 16.0946V7.90563C21.2079 7.05339 20.7264 6.27429 19.9641 5.89316L13.0066 2.41453Z"
                  fill=""
                />
              </svg>

              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Produk
              </span>

              </a>

            </li>

          <!-- Menu Item Profile -->
          <li>
            <a
              href="profile.html"
              @click="selected = (selected === 'Profile' ? '':'Profile')"
              class="menu-item group"
              :class=" (selected === 'Profile') && (page === 'profile') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="(selected === 'Profile') && (page === 'profile') ?  'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                  fill=""
                />
              </svg>

              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Booking
              </span>
            </a>
          </li>
          <!-- Menu Item Profile -->

          <!-- Menu Item Pages -->
          <li>
            <a
              href="blank.html"
              class="menu-item group"
              :class="page === 'blank' ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="page === 'blank' ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M8.50391 4.25C8.50391 3.83579 8.83969 3.5 9.25391 3.5H15.2777C15.4766 3.5 15.6674 3.57902 15.8081 3.71967L18.2807 6.19234C18.4214 6.333 18.5004 6.52376 18.5004 6.72268V16.75C18.5004 17.1642 18.1646 17.5 17.7504 17.5H16.248V17.4993H14.748V17.5H9.25391C8.83969 17.5 8.50391 17.1642 8.50391 16.75V4.25ZM14.748 19H9.25391C8.01126 19 7.00391 17.9926 7.00391 16.75V6.49854H6.24805C5.83383 6.49854 5.49805 6.83432 5.49805 7.24854V19.75C5.49805 20.1642 5.83383 20.5 6.24805 20.5H13.998C14.4123 20.5 14.748 20.1642 14.748 19.75L14.748 19ZM7.00391 4.99854V4.25C7.00391 3.00736 8.01127 2 9.25391 2H15.2777C15.8745 2 16.4468 2.23705 16.8687 2.659L19.3414 5.13168C19.7634 5.55364 20.0004 6.12594 20.0004 6.72268V16.75C20.0004 17.9926 18.9931 19 17.7504 19H16.248L16.248 19.75C16.248 20.9926 15.2407 22 13.998 22H6.24805C5.00541 22 3.99805 20.9926 3.99805 19.75V7.24854C3.99805 6.00589 5.00541 4.99854 6.24805 4.99854H7.00391Z"
                  fill=""
                />
              </svg>

              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                FAQ & Ulasan
              </span>
            </a>

            </li>

          <!-- Menu Item Verifikasi -->
          <li>
            <a
              href="form-elements.html"
              class="menu-item group"
              :class="page === 'formElements' ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="page === 'formElements' ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                  fill=""
                />
              </svg>

              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Verifikasi
              </span>

              </a>

            </li>
          <!-- Menu Item Pages -->
        </ul>
      </div>
    </nav>
    <!-- Sidebar Menu -->
  </div>
</aside>

      <div
        class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto"
      >
        <div
  @click="sidebarToggle = false"
  :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
  class="fixed w-full h-screen z-9 bg-gray-900/50"
></div>
<header
  x-data="{menuToggle: false}"
  class="sticky top-0 z-99999 flex w-full border-gray-200 bg-white lg:border-b dark:border-gray-800 dark:bg-gray-900"
>
  <div
    class="flex grow flex-col items-center justify-between lg:flex-row lg:px-6"
  >
    <div
      class="flex w-full items-center justify-between gap-2 border-b border-gray-200 px-3 py-3 sm:gap-4 lg:justify-normal lg:border-b-0 lg:px-0 lg:py-4 dark:border-gray-800"
    >
      <!-- Hamburger Toggle BTN -->
      <button
        :class="sidebarToggle ? 'lg:bg-transparent dark:lg:bg-transparent bg-gray-100 dark:bg-gray-800' : ''"
        class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg border-gray-200 text-gray-500 lg:h-11 lg:w-11 lg:border dark:border-gray-800 dark:text-gray-400"
        @click.stop="sidebarToggle = !sidebarToggle"
      >
        <svg
          class="hidden fill-current lg:block"
          width="16"
          height="12"
          viewBox="0 0 16 12"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z"
            fill=""
          />
        </svg>

        <svg
          :class="sidebarToggle ? 'hidden' : 'block lg:hidden'"
          class="fill-current lg:hidden"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M3.25 6C3.25 5.58579 3.58579 5.25 4 5.25L20 5.25C20.4142 5.25 20.75 5.58579 20.75 6C20.75 6.41421 20.4142 6.75 20 6.75L4 6.75C3.58579 6.75 3.25 6.41422 3.25 6ZM3.25 18C3.25 17.5858 3.58579 17.25 4 17.25L20 17.25C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75L4 18.75C3.58579 18.75 3.25 18.4142 3.25 18ZM4 11.25C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75L12 12.75C12.4142 12.75 12.75 12.4142 12.75 12C12.75 11.5858 12.4142 11.25 12 11.25L4 11.25Z"
            fill=""
          />
        </svg>

        <!-- cross icon -->
        <svg
          :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
          class="fill-current"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z"
            fill=""
          />
        </svg>
      </button>
      <!-- Hamburger Toggle BTN -->

      <a href="index.html" class="lg:hidden">
        <img class="dark:hidden" src="src/images/logo/logo.svg" alt="Logo" />
        <img
          class="hidden dark:block"
          src="src/images/logo/logo-dark.svg"
          alt="Logo"
        />
      </a>

      <!-- Application nav menu button -->
      <button
        class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg text-gray-700 hover:bg-gray-100 lg:hidden dark:text-gray-400 dark:hover:bg-gray-800"
        :class="menuToggle ? 'bg-gray-100 dark:bg-gray-800' : ''"
        @click.stop="menuToggle = !menuToggle"
      >
        <svg
          class="fill-current"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M5.99902 10.4951C6.82745 10.4951 7.49902 11.1667 7.49902 11.9951V12.0051C7.49902 12.8335 6.82745 13.5051 5.99902 13.5051C5.1706 13.5051 4.49902 12.8335 4.49902 12.0051V11.9951C4.49902 11.1667 5.1706 10.4951 5.99902 10.4951ZM17.999 10.4951C18.8275 10.4951 19.499 11.1667 19.499 11.9951V12.0051C19.499 12.8335 18.8275 13.5051 17.999 13.5051C17.1706 13.5051 16.499 12.8335 16.499 12.0051V11.9951C16.499 11.1667 17.1706 10.4951 17.999 10.4951ZM13.499 11.9951C13.499 11.1667 12.8275 10.4951 11.999 10.4951C11.1706 10.4951 10.499 11.1667 10.499 11.9951V12.0051C10.499 12.8335 11.1706 13.5051 11.999 13.5051C12.8275 13.5051 13.499 12.8335 13.499 12.0051V11.9951Z"
            fill=""
          />
        </svg>
      </button>
    </div>

    <div
      :class="menuToggle ? 'flex' : 'hidden'"
      class="shadow-theme-md w-full items-center justify-between gap-4 px-5 py-4 lg:flex lg:justify-end lg:px-0 lg:shadow-none"
    >

      <!-- User Area -->
      <div
        class="relative"
        x-data="{ dropdownOpen: false }"
        @click.outside="dropdownOpen = false"
      >
        <a
          class="flex items-center text-gray-700 dark:text-gray-400"
          href="#"
          @click.prevent="dropdownOpen = ! dropdownOpen"
        >
          <span class="mr-3 h-11 w-11 overflow-hidden rounded-full">
            <img src="src/images/user/owner.jpg" alt="User" />
          </span>

          <span class="text-theme-sm mr-1 block font-medium"> Admin 1 </span>

          <svg
            :class="dropdownOpen && 'rotate-180'"
            class="stroke-gray-500 dark:stroke-gray-400"
            width="18"
            height="20"
            viewBox="0 0 18 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M4.3125 8.65625L9 13.3437L13.6875 8.65625"
              stroke=""
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </a>

        <!-- Dropdown Start -->
        <div
          x-show="dropdownOpen"
          class="shadow-theme-lg dark:bg-gray-dark absolute right-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-gray-200 bg-white p-3 dark:border-gray-800"
        >
          <div>
            <span
              class="text-theme-sm block font-medium text-gray-700 dark:text-gray-400"
            >
              Admin 1
            </span>
          </div>

          <button
            class="group text-theme-sm mt-3 flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300"
          >
            <svg
              class="fill-gray-500 group-hover:fill-gray-700 dark:group-hover:fill-gray-300"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M15.1007 19.247C14.6865 19.247 14.3507 18.9112 14.3507 18.497L14.3507 14.245H12.8507V18.497C12.8507 19.7396 13.8581 20.747 15.1007 20.747H18.5007C19.7434 20.747 20.7507 19.7396 20.7507 18.497L20.7507 5.49609C20.7507 4.25345 19.7433 3.24609 18.5007 3.24609H15.1007C13.8581 3.24609 12.8507 4.25345 12.8507 5.49609V9.74501L14.3507 9.74501V5.49609C14.3507 5.08188 14.6865 4.74609 15.1007 4.74609L18.5007 4.74609C18.9149 4.74609 19.2507 5.08188 19.2507 5.49609L19.2507 18.497C19.2507 18.9112 18.9149 19.247 18.5007 19.247H15.1007ZM3.25073 11.9984C3.25073 12.2144 3.34204 12.4091 3.48817 12.546L8.09483 17.1556C8.38763 17.4485 8.86251 17.4487 9.15549 17.1559C9.44848 16.8631 9.44863 16.3882 9.15583 16.0952L5.81116 12.7484L16.0007 12.7484C16.4149 12.7484 16.7507 12.4127 16.7507 11.9984C16.7507 11.5842 16.4149 11.2484 16.0007 11.2484L5.81528 11.2484L9.15585 7.90554C9.44864 7.61255 9.44847 7.13767 9.15547 6.84488C8.86248 6.55209 8.3876 6.55226 8.09481 6.84525L3.52309 11.4202C3.35673 11.5577 3.25073 11.7657 3.25073 11.9984Z"
                fill=""
              />
            </svg>

            Sign out
          </button>
        </div>
        <!-- Dropdown End -->
      </div>
      <!-- User Area -->
    </div>
  </div>
</header>
<main class="flex-1 bg-gray-50 dark:bg-gray-900">
          <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">

            <div x-show="view === 'list'" x-transition>
              <div x-data="{ pageName: 'Produk'}">
                <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
  <h2
    class="text-xl font-semibold text-gray-800 dark:text-white/90"
    x-text="pageName"
  ></h2>

  <nav>
    <ol class="flex items-center gap-1.5">
      <li>
        <a
          class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
          href="index.html"
        >
          Home
          <svg
            class="stroke-current"
            width="17"
            height="16"
            viewBox="0 0 17 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366"
              stroke=""
              stroke-width="1.2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </a>
      </li>
      <li
        class="text-sm text-gray-800 dark:text-white/90"
        x-text="pageName"
      ></li>
    </ol>
  </nav>
</div>
</div>

              <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-800 shadow-sm overflow-x-auto mt-6">
                <table class="w-full text-left">
                  <thead class="border-b border-gray-200 dark:border-gray-700">
                    <tr class="text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                      <th class="px-6 py-4">Gambar</th>
                      <th class="px-6 py-4">Kamar</th>
                      <th class="px-6 py-4">Jenis</th>
                      <th class="px-6 py-4">Harga</th>
                      <th class="px-6 py-4">Stok</th>
                      <th class="px-6 py-4">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-sm text-gray-700 dark:text-gray-300 divide-y divide-gray-200 dark:divide-gray-700">

                    <template x-for="product in products" :key="product.id">
                      <tr>
                        <td class="px-6 py-4">
                          <img :src="product.img" alt="Kamar" class="w-10 h-10 rounded-md object-cover"/>
                        </td>
                        <td class="px-6 py-4 font-medium" x-text="product.name"></td>
                        <td class="px-6 py-4" x-text="product.category"></td>
                        <td class="px-6 py-4" x-text="`Rp ${formatPrice(product.price)}`"></td>
                        <td class="px-6 py-4" x-text="product.stock"></td>
                        <td class="px-6 py-4">
                          <div class="flex items-center gap-3">
                            <button
                              @click="editProduct(product)"
                              class="text-gray-500 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400"
                            >
                              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"/>
                              </svg>
                            </button>
                            <button
                              @click="productToDeleteId = product.id; isDeleteModalOpen = true"
                              class="text-gray-500 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-400"
                            >
                              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                              </svg>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </template>

                    <tr x-show="products.length === 0">
                      <td colspan="6" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                        Produk belum ditambahkan.
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>

            <template x-if="view === 'edit'">
              <div x-transition>
                <div x-data="{ pageName: selectedProduct.id ? 'Edit Produk' : 'Tambah Produk' }">
                  <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
  <h2
    class="text-xl font-semibold text-gray-800 dark:text-white/90"
    x-text="pageName"
  ></h2>

  <nav>
    <ol class="flex items-center gap-1.5">
      <li>
        <a
          class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
          href="index.html"
        >
          Home
          <svg
            class="stroke-current"
            width="17"
            height="16"
            viewBox="0 0 17 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366"
              stroke=""
              stroke-width="1.2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </a>
      </li>
      <li
        class="text-sm text-gray-800 dark:text-white/90"
        x-text="pageName"
      ></li>
    </ol>
  </nav>
</div>
</div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">

                  <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">

                      <div
                        x-data="{
                          mainImage: selectedProduct.images[0] || './images/product/product-placeholder.png',
                          activeIndex: 0,
                          next() {
                            if(selectedProduct.images.length === 0) return;
                            this.activeIndex = (this.activeIndex + 1) % selectedProduct.images.length;
                            this.mainImage = selectedProduct.images[this.activeIndex];
                          },
                          prev() {
                            if(selectedProduct.images.length === 0) return;
                            this.activeIndex = (this.activeIndex - 1 + selectedProduct.images.length) % selectedProduct.images.length;
                            this.mainImage = selectedProduct.images[this.activeIndex];
                          }
                        }"
                      >
                        <div class="relative rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-700">
                          <img :src="mainImage" alt="Family Room" class="w-full h-auto object-cover aspect-video transition-all duration-300">
                          <button @click="prev()" class="absolute top-1/2 left-4 -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 transition-colors z-10">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                          </button>
                          <button @click="next()" class="absolute top-1/2 right-4 -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 transition-colors z-10">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                          </button>
                        </div>
                        <div class="grid grid-cols-5 gap-2 mt-4">
                          <template x-for="(image, index) in selectedProduct.images" :key="index">
                            <button
                              @click="mainImage = image; activeIndex = index"
                              :class="activeIndex === index ? 'ring-2 ring-offset-2 ring-gray-700 dark:ring-blue-500' : 'ring-1 ring-gray-200 dark:ring-gray-700'"
                              class="rounded-md overflow-hidden transition-all"
                            >
                              <img :src="image" alt="Thumbnail" class="w-full h-auto object-cover aspect-square">
                            </button>
                          </template>
                        </div>
                      </div>

                      <div class="mt-6">
                        <h4 class="text-md font-medium text-gray-800 dark:text-white mb-2">Upload Gambar Baru</h4>
                        <label for="file-upload" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                          <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L7 9m3-3 3 3"/>
                            </svg>
                            <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik untuk upload</span> atau tarik dan lepas</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, atau GIF (MAX. 800x400px)</p>
                          </div>
                          <input id="file-upload" type="file" class="hidden" @change="handleFiles($event)" multiple />
                        </label>

                        <div x-show="newImages.length > 0" class="mt-4">
                          <h5 class="text-sm font-medium text-gray-700 dark:text-gray-300">Gambar yang akan di-upload:</h5>
                          <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-4 mt-2">
                            <template x-for="(img, index) in newImages" :key="index">
                              <div class="relative">
                                <img :src="img.url" class="w-full h-24 object-cover rounded-md border border-gray-200 dark:border-gray-600">
                                <button @click="removeNewImage(index)" class="absolute -top-2 -right-2 w-6 h-6 bg-red-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-md">&times;</button>
                                <p class="text-xs text-gray-600 dark:text-gray-400 truncate" x-text="img.name"></p>
                              </div>
                            </template>
                          </div>
                        </div>
                      </div>
                      <div x-data="{ activeTab: 'umum' }" class="mt-8">
                        <div class="border-b border-gray-200 dark:border-gray-700">
                          <nav class="flex -mb-px space-x-8" aria-label="Tabs">
                            <button
                              @click="activeTab = 'umum'"
                              :class="activeTab === 'umum' ? 'border-gray-700 dark:border-blue-500 text-gray-800 dark:text-white' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300'"
                              class="py-4 px-1 border-b-2 font-medium text-sm transition-colors"
                            >
                              Gambaran Umum
                            </button>
                            <button
                              @click="activeTab = 'ulasan'"
                              :class="activeTab === 'ulasan' ? 'border-gray-700 dark:border-blue-500 text-gray-800 dark:text-white' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300'"
                              class="py-4 px-1 border-b-2 font-medium text-sm transition-colors"
                            >
                              Ulasan
                            </button>
                          </nav>
                        </div>
                        <div class="py-6">
                          <div x-show="activeTab === 'umum'" x-transition>
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Deskripsi Kamar</h3>
                            <textarea
                              x-model="selectedProduct.description"
                              rows="5"
                              placeholder="Masukkan deskripsi kamar di sini..."
                              class="w-full mt-4 text-gray-600 dark:text-gray-400 leading-relaxed bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            ></textarea>
                          </div>
                          <div x-show="activeTab === 'ulasan'" x-transition style="display: none;">
                            <p class="text-gray-600 dark:text-gray-400">Belum ada ulasan untuk produk ini.</p>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                      <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nama Kamar</label>
                      <input type="text" x-model="selectedProduct.name" class="text-2xl font-bold text-gray-800 dark:text-white bg-transparent border-0 p-0 w-full focus:ring-0">

                      <label class="block mt-2 text-sm font-medium text-gray-500 dark:text-gray-400">Tipe Kamar</label>
                      <input type="text" x-model="selectedProduct.category" class="text-lg text-gray-600 dark:text-gray-400 bg-transparent border-0 p-0 w-full focus:ring-0">

                      <div class="flex items-center mt-2">
                        <div class="flex items-center gap-0.5 text-yellow-500">
                          <template x-for="i in 5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21L12 17.27z"/>
                            </svg>
                          </template>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-600 dark:text-gray-400">(4.9)</span>
                      </div>
                      <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Harga per Malam</label>
                        <div class="relative">
                          <span class="absolute left-2 top-1/2 -translate-y-1/2 text-3xl font-bold text-gray-800 dark:text-white">Rp </span>
                          <input
                            type="text"
                            x-model="displayPrice"
                            @input="$el.value = formatPrice($el.value); displayPrice = $el.value"
                            class="text-3xl font-bold text-gray-800 dark:text-white bg-transparent border-0 p-0 w-full focus:ring-0 pl-12"
                          >
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">*Harga akhir pekan. Pajak dan biaya lain tidak termasuk</p>
                      </div>
                    </div>

                    <div x-data="{ stockActive: selectedProduct.stock > 0 }" class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                      <div class="flex items-center justify-between">
                        <label for="stock" class="font-medium text-gray-700 dark:text-gray-300">Stok Tersedia</label>
                        <button
                          @click="stockActive = !stockActive"
                          :class="stockActive ? 'bg-green-600' : 'bg-gray-200 dark:bg-gray-600'"
                          class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none"
                          role="switch"
                          :aria-checked="stockActive.toString()"
                        >
                          <span
                            :class="stockActive ? 'translate-x-5' : 'translate-x-0'"
                            class="inline-block w-5 h-5 rounded-full bg-white dark:bg-gray-300 shadow transform ring-0 transition ease-in-out duration-200"
                          ></span>
                        </button>
                      </div>
                      <div class="flex items-center justify-between mt-4">
                        <label class="font-medium text-gray-700 dark:text-gray-300">Jumlah Stok</label>
                        <div class="flex items-center gap-2">
                          <button @click="selectedProduct.stock = Math.max(0, selectedProduct.stock - 1)" class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                          </button>
                          <input type="text" x-model.number="selectedProduct.stock" class="w-12 text-center text-lg font-medium text-gray-800 dark:text-white bg-transparent border-0 p-0 focus:ring-0">
                          <button @click="selectedProduct.stock++" class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                          </button>
                        </div>
                      </div>
                      <div class="grid grid-cols-2 gap-4 mt-6">
                        <button @click="showList()" class="w-full py-3 px-4 rounded-lg bg-gray-200 text-gray-800 font-medium hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 transition-colors">
                          Batal
                        </button>
                        <button @click="saveProduct()" class="w-full py-3 px-4 rounded-lg bg-gray-700 text-white font-medium hover:bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-500 transition-colors">
                          Simpan
                        </button>
                      </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                      <div class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-2.238M12 6a3 3 0 100-6 3 3 0 000 6zM12 18H3a2 2 0 00-2 2v0h11m0-12a3 3 0 010 6 3 3 0 010-6zM15.3 12.3A5.02 5.02 0 0117 13a5 5 0 015 5v2H2v-2a5 5 0 015-5c.4 0 .8.05 1.18.15"></path></svg>
                        </div>
                        <p class="font-medium text-gray-800 dark:text-white">Kapasitas Tamu</p>
                      </div>

                      <div class="flex items-center justify-between mt-4">
                        <label class="font-medium text-gray-700 dark:text-gray-300">Jumlah Tamu</label>
                        <div class="flex items-center gap-2">
                          <button @click="selectedProduct.capacity = Math.max(1, selectedProduct.capacity - 1)" class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                          </button>
                          <input type="text" x-model.number="selectedProduct.capacity" class="w-12 text-center text-lg font-medium text-gray-800 dark:text-white bg-transparent border-0 p-0 focus:ring-0">
                          <button @click="selectedProduct.capacity++" class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                          </button>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </template>

            <button
              x-show="view === 'list'"
              x-transition:enter="transition ease-out duration-300 transform"
              x-transition:enter-start="opacity-0 scale-75"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-200 transform"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-75"
              @click="addProductForm()"
              class="fixed right-10 bottom-10 z-30 flex items-center justify-center w-14 h-14 bg-gray-800 rounded-full text-white shadow-lg hover:bg-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600 transition-all"
            >
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
              </svg>
            </button>

          </div>
        </main>

        <div
          x-show="isDeleteModalOpen"
          x-transition:enter="transition ease-out duration-300 transform"
          x-transition:enter-start="opacity-0 scale-95"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-200 transform"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-95"
          class="absolute inset-0 z-50 flex items-center justify-center p-4"
          style="display: none"
        >
          <div
            @click.away="isDeleteModalOpen = false; productToDeleteId = null"
            class="w-full max-w-sm p-6 text-center bg-white dark:bg-gray-800 rounded-2xl shadow-xl"
          >
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">
              Apakah Anda yakin ingin menghapus produk ini?
            </h3>
            <div class="grid grid-cols-2 gap-4 mt-6">
              <button
                @click="isDeleteModalOpen = false; productToDeleteId = null"
                class="px-4 py-2.5 font-medium text-white bg-red-600 rounded-lg hover:bg-red-700"
              >
                Batal
              </button>
              <button
                @click="deleteProduct()"
                class="px-4 py-2.5 font-medium text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
              >
                Ya
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      function productPageData() {
        return {
          page: 'videos',
          'loaded': true,
          'darkMode': false,
          'stickyMenu': false,
          'sidebarToggle': false,
          'scrollTop': false,
          isDeleteModalOpen: false,
          productToDeleteId: null,

          // State untuk manajemen tampilan
          view: 'list', // 'list', 'edit'
          selectedProduct: null, // Menyimpan produk yang dipilih untuk diedit
          newImages: [], // Array untuk pratinjau gambar baru

          // PERUBAHAN: Variabel untuk menyimpan harga yang diformat di input
          displayPrice: '',

          // Data master produk
          // PERUBAHAN: Harga (price) diubah menjadi number, properti capacity ditambahkan
          products: [
            {
              id: 1,
              img: './images/product/product-01.jpg',
              name: 'Family Room (tipe sungai & dapur)',
              category: 'Family Room',
              price: 850000,
              stock: 63,
              capacity: 4,
              images: [
                './images/product/product-01.jpg',
                './images/product/product-05.jpg',
                './images/product/product-02.jpg',
                './images/product/product-03.jpg',
                './images/product/product-04.jpg'
              ],
              description: 'Dirancang khusus untuk kenyamanan maksimal keluarga, unit Family Room kami adalah pilihan termewah di Villa ini. Dilengkapi dengan dapur pribadi dan pemandangan sungai.'
            },
            {
              id: 2,
              img: './images/product/product-02.jpg',
              name: 'Family Room (tipe sungai)',
              category: 'Family Room',
              price: 190000,
              stock: 13,
              capacity: 4,
              images: ['./images/product/product-02.jpg', './images/product/product-01.jpg'],
              description: 'Kamar keluarga dengan pemandangan sungai yang menenangkan.'
            },
            {
              id: 3,
              img: './images/product/product-03.jpg',
              name: 'Family Room (tipe gunung)',
              category: 'Family Room',
              price: 640000,
              stock: 635,
              capacity: 4,
              images: ['./images/product/product-03.jpg', './images/product/product-01.jpg'],
              description: 'Kamar keluarga dengan pemandangan gunung yang indah.'
            },
            {
              id: 4,
              img: './images/product/product-04.jpg',
              name: 'Twin Bed',
              category: 'Standard',
              price: 400000,
              stock: 67,
              capacity: 2,
              images: ['./images/product/product-04.jpg', './images/product/product-01.jpg'],
              description: 'Kamar standar dengan dua tempat tidur single.'
            },
            {
              id: 5,
              img: './images/product/product-01.jpg',
              name: 'Queen Bed',
              category: 'Standard',
              price: 420000,
              stock: 52,
              capacity: 2,
              images: ['./images/product/product-01.jpg', './images/product/product-02.jpg'],
              description: 'Kamar standar dengan satu tempat tidur ukuran queen.'
            },
            {
              id: 6,
              img: './images/product/product-02.jpg',
              name: 'Super Deluxe',
              category: 'Deluxe',
              price: 190000,
              stock: 13,
              capacity: 2,
              images: ['./images/product/product-02.jpg', './images/product/product-03.jpg'],
              description: 'Kamar Super Deluxe dengan fasilitas tambahan.'
            },
          ],

          // Template untuk produk baru
          // PERUBAHAN: Harga diubah jadi number, capacity ditambahkan
          newProductTemplate: {
            id: null,
            img: './images/product/product-placeholder.png', // Gambar default
            name: '', // Dikosongkan
            category: '', // Dikosongkan
            price: 0,
            stock: 0,
            capacity: 2, // Default kapasitas
            images: [], // Dikosongkan
            description: '' // Dikosongkan
          },

          // --- Fungsi Logika ---

          // PERUBAHAN: Fungsi baru untuk format harga
          formatPrice(value) {
            if (!value) return '0';
            // Bersihkan string dari non-angka
            let numberString = String(value).replace(/[^0-9]/g, '');
            if (numberString === '') return '0';
            // Tambahkan titik sebagai pemisah ribuan
            return numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
          },

          // Fungsi untuk menangani file upload
          handleFiles(event) {
            let files = Array.from(event.target.files);
            for (let file of files) {
              this.newImages.push({
                url: URL.createObjectURL(file),
                name: file.name
              });
            }
            // Kosongkan input file agar bisa memilih file yang sama lagi
            event.target.value = null;
          },

          // Fungsi untuk menghapus pratinjau gambar
          removeNewImage(index) {
            URL.revokeObjectURL(this.newImages[index].url); // Bebaskan memori
            this.newImages.splice(index, 1);
          },

          // Fungsi untuk pindah ke mode edit
          editProduct(product) {
            this.selectedProduct = JSON.parse(JSON.stringify(product));
            // PERUBAHAN: Set displayPrice saat edit
            this.displayPrice = this.formatPrice(this.selectedProduct.price);
            this.newImages = []; // Bersihkan pratinjau
            this.view = 'edit';
            window.scrollTo(0, 0);
          },

          // Fungsi untuk kembali ke daftar
          showList() {
            this.selectedProduct = null;
            this.newImages = []; // Bersihkan pratinjau
            this.displayPrice = ''; // Bersihkan displayPrice
            this.view = 'list';
          },

          // Fungsi untuk menampilkan form tambah
          addProductForm() {
            this.selectedProduct = JSON.parse(JSON.stringify(this.newProductTemplate));
            // PERUBAHAN: Set displayPrice saat tambah baru
            this.displayPrice = this.formatPrice(this.selectedProduct.price);
            this.newImages = []; // Bersihkan pratinjau
            this.view = 'edit';
            window.scrollTo(0, 0);
          },

          // Fungsi untuk menyimpan produk (simulasi)
          saveProduct() {
            // PERUBAHAN: Konversi displayPrice kembali ke number
            this.selectedProduct.price = Number(String(this.displayPrice).replace(/[^0-9]/g, ''));

            // 1. Tambahkan gambar baru (dari pratinjau) ke data produk
            const uploadedImageUrls = this.newImages.map(img => img.url);
            this.selectedProduct.images.push(...uploadedImageUrls);

            // 2. Set gambar utama (thumbnail) jika belum ada
            if (!this.selectedProduct.img && this.selectedProduct.images.length > 0) {
              this.selectedProduct.img = this.selectedProduct.images[0];
            } else if (!this.selectedProduct.img) {
              // Jika masih belum ada gambar, set ke placeholder
              this.selectedProduct.img = './images/product/product-placeholder.png';
            }

            if (this.selectedProduct.id) {
              // Mode Edit
              const index = this.products.findIndex(p => p.id === this.selectedProduct.id);
              if (index > -1) {
                this.products[index] = JSON.parse(JSON.stringify(this.selectedProduct));
              }
            } else {
              // Mode Tambah
              this.selectedProduct.id = Date.now(); // Buat ID unik baru
              this.products.push(JSON.parse(JSON.stringify(this.selectedProduct)));
            }

            console.log('Produk Disimpan:', this.selectedProduct);
            this.showList(); // Kembali ke daftar produk
          },

          deleteProduct() {
            if (this.productToDeleteId) {
              this.products = this.products.filter(p => p.id !== this.productToDeleteId);
              console.log('Produk Dihapus:', this.productToDeleteId);
              this.productToDeleteId = null;
              this.isDeleteModalOpen = false;
            }
          }
        };
      }
    </script>
  <script defer src="/js/admin/bundle.js"></script></body>
</html>
