import {StrictMode} from 'react'
import {createRoot} from 'react-dom/client'
import {RouterProvider} from "react-router-dom";
import router from "./router.jsx";
import {ContextProvider} from "./contexts/ContextProvider.jsx";
import "./assets/css/bootstrap.bundle.min.js";
import "./assets/css/bootstrap.min.css";
import {TitleProvider} from "./components/PageTitle.jsx";

createRoot(document.getElementById('root')).render(
    <StrictMode>
        <ContextProvider>
            <TitleProvider>
                <RouterProvider router={router}/>
            </TitleProvider>
        </ContextProvider>
    </StrictMode>,
)
