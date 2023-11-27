<x-filament-panels::page>

<ol class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-400">
    <li>
       List item one
       <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
          <li>You might feel like you are being really "organized" o</li>
          <li>Nested navigation in UIs is a bad idea too, keep things as flat as possible.</li>
          <li>Nesting tons of folders in your source code is also not helpful.</li>
       </ul>
    </li>
    <li>
       List item two
       <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
          <li>I'm not sure if we'll bother styling more than two levels deep.</li>
          <li>Two is already too much, three is guaranteed to be a bad idea.</li>
          <li>If you nest four levels deep you belong in prison.</li>
       </ul>
    </li>
    <li>
       List item three
       <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
          <li>Again please don't nest lists if you want</li>
          <li>Nobody wants to look at this.</li>
          <li>I'm upset that we even have to bother styling this.</li>
       </ul>
    </li>
 </ol>
{{$this->form}} 
</x-filament-panels::page>
