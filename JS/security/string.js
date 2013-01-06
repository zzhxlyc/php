function escapeUnsafe(unsafe) {
    return unsafe
			.replace(/&/g, "&amp;")
    		.replace(/</g, "&lt;")
    		.replace(/>/g, "&gt;")
    		.replace(/"/g, "&quot;")
    		.replace(/'/g, "&#039;")
    		.replace(/\\/g, "&#92;");
 }

function escapeQuot(unsafe) {
    return unsafe
    		.replace(/&/g, "&amp;")
    		.replace(/"/g, "&quot;")
    		.replace(/'/g, "&#039;");
 }