const api = "https://api.sheetmonkey.io/form/sjcsLdCQaJEsZkvXGTR2zu";

async function sendData() {
  try {
    const res = await fetch(api, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        name: "Test User",
        email: "test@example.com",
      }),
    });

    const text = await res.text(); // 👈 NOT json
    console.log("Status:", res.status);
    console.log("Response:", text);
  } catch (err) {
    console.error(err);
  }
}

sendData();
