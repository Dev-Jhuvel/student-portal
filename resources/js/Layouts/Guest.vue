<template>
    <div>
        <header class="bg-black py-4">
            <nav class="flex justify-between">
                <div>
                    <img
                        class="h-16 w-16 mx-5"
                        src="../../images/university.png"
                        alt=""
                    />
                </div>
                <Link
                    class="text-white font-bold text-2xl p-3 mx-5 border rounded-lg"
                    :class="
                        $page.props.initialComponent !== 'Login' ? 'hidden' : ''
                    "
                    :href="route('login')"
                    >Login</Link
                >
            </nav>
        </header>
        <main>
            <p
                v-if="$page.props.flash.message"
                class="bg-green-200 p-4 text-center z-10"
            >
                {{ $page.props.flash.message }}
            </p>
            <slot />
        </main>
    </div>
</template>
