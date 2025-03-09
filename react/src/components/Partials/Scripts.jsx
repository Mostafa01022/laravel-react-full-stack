import { useEffect, useState } from "react";

export default function Scripts() {
    const [csrfToken, setCsrfToken] = useState(document.querySelector('meta[name="csrf-token"]')?.content || "");
    const [stopLoadFlag, setStopLoadFlag] = useState(0);
    const baseUrl = "/"; // يمكنك تعديل هذا ليكون متغير بيئة

    useEffect(() => {
        // إخفاء الـ Loader عند تحميل الصفحة
        document.getElementById("load").style.visibility = "hidden";

        // تحديث CSRF Token كل دقيقة
        const refreshToken = () => {
            setStopLoadFlag(1);
            fetch(`${baseUrl}/refresh-csrf`, { method: "GET" })
                .then((res) => res.text())
                .then((data) => {
                    setStopLoadFlag(0);
                    setCsrfToken(data);
                    document.querySelector('meta[name="csrf-token"]').setAttribute("content", data);
                })
                .catch(() => setStopLoadFlag(0));
        };

        const interval = setInterval(refreshToken, 60000); // تحديث كل دقيقة
        return () => clearInterval(interval); // تنظيف عند الخروج

    }, []);

    useEffect(() => {
        // ضبط إعدادات AJAX
        window.$.ajaxSetup({
            headers: { "X-CSRF-TOKEN": csrfToken },
        });

        // إظهار أو إخفاء Loader أثناء الـ AJAX
        window.$(document).ajaxStart(() => {
            if (stopLoadFlag !== 1) document.getElementById("load").style.visibility = "visible";
        }).ajaxStop(() => {
            if (document.getElementById("load").style.visibility === "visible")
                document.getElementById("load").style.visibility = "hidden";
        });

        // تفعيل القوائم المنسدلة
        window.$(".dropdown").click(function () {
            window.$(".dropdown-menu").toggleClass("show");
        });

        // تمييز الصف المحدد في الجدول
        window.$("table").on("click", "tr", function () {
            const tr = window.$(this);
            tr.closest("tbody").find("tr").removeClass("tbody-selected");
            tr.addClass("tbody-selected");
        });

    }, [csrfToken, stopLoadFlag]);

    return (
        <>
            {/* Global Scripts */}
            <script src="../../assets/plugins/global/plugins.bundle.js"></script>
            <script src="../../assets/js/scripts.bundle.js"></script>

            {/* Custom Scripts */}
            <script src="../../assets/js/main.js"></script>
            <script src="../../assets/js/privileges.js"></script>
        </>
    );
}
