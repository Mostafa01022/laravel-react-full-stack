import { createContext, useContext, useState } from "react";

const TitleContext = createContext();

export function useTitle() {
    return useContext(TitleContext);
}

export function TitleProvider({ children }) {
    const [title, setTitle] = useState("Dashboard");

    return (
        <TitleContext.Provider value={{ title, setTitle }}>
            {children}
        </TitleContext.Provider>
    );
}
