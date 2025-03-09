import { useStateContext } from "../../contexts/ContextProvider.jsx";
import logo from "../../assets/images/logo.png";

export default function HeadComponent({ pageTitle }) {
    const { token } = useStateContext();

    return (
        <>
            <title>{pageTitle}</title>
            <meta charSet="utf-8" />
            <meta property="og:locale" content="en_US" />
            <meta property="og:type" content="article" />
            <link rel="shortcut icon" href={logo} />
            {/* Google Fonts */}
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

            {/* CSRF Token */}
            <meta name="csrf-token" content={token} />

            {/* Loader Style */}
            <style>
                {`
                    .btn-xs {
                        padding: 0.25rem 0.5rem !important;
                        font-size: .875rem !important;
                        margin: 2px;
                        border-radius: 7px !important;
                    }
                    #load {
                        visibility: visible;
                        position: fixed;
                        z-index: 1000;
                        top: 0;
                        left: 0;
                        height: 100%;
                        width: 100%;
                        background: rgba(255, 255, 255, .95) url("/media/spinner2.gif") 50% 50% no-repeat !important;
                    }
                `}
            </style>
        </>
    );
}
