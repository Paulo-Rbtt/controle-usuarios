<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <main>
    <header>
      <Link href="/" class="mx-2">Home</Link>
      <Link href="/register" class="mx-2">Cadastrar</Link>
      <!-- <Link href="/" class="mx-2">Contact</Link> -->
    </header>
    <article>
      <div class="container">
        <slot />
      </div>
    </article>
  </main>
</template>