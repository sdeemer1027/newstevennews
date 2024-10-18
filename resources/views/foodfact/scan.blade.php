<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Scan Barcode
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-gray-100">
                    <form method="POST" action="{{ route('processBarcode') }}" id="barcodeForm">
                        @csrf
                        <label for="barcode">Scanned Barcode:</label>
                        <input type="text" id="barcode" name="barcode" required>
                        <button type="submit">Submit</button>
                    </form>

                    <div id="barcodeScanner" style="width: 100%; height: 300px;"></div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
                    <script type="text/javascript">
                        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                            Quagga.init({
                                inputStream: {
                                    name: "Live",
                                    type: "LiveStream",
                                    target: document.querySelector('#barcodeScanner'),
                                    constraints: {
                                        facingMode: "environment" // Use back camera on mobile devices
                                    }
                                },
                                decoder: {
                                    readers: ["code_128_reader", "ean_reader", "upc_reader"] // Add other readers as needed
                                }
                            }, function (err) {
                                if (err) {
                                    console.error(err);
                                    alert('Error initializing camera. Please check your camera permissions.');
                                    return;
                                }
                                console.log("QuaggaJS initialized");
                                Quagga.start();
                            });

                            Quagga.onDetected(function (data) {
                                const barcode = data.codeResult.code;
                                document.querySelector('#barcode').value = barcode;

                                // Automatically submit the form after scanning
                                document.getElementById('barcodeForm').submit();
                            });
                        } else {
                            alert('Camera is not supported on this device or browser.');
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
