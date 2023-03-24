import './App.css';
import './static/css/style.css'
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Navigation from './components/Navigation'
import Index from './components/Index';
import About_us from './components/About_us';
import Contact_us from './components/Contact_us';
import Types_of_Services from './components/Types_of_Services';
import Shopping_Cart from './components/Shopping_Cart';
import Map from './components/Map';
import Select from './components/Select'

function App() {
  return (
    <div className="App">
      <Navigation></Navigation>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Index/>}></Route>
          <Route path="/about_us" element={<About_us/>}></Route>
          <Route path="/contact_us" element={<Contact_us/>}></Route>
          <Route path="/types_of_services" element={<Types_of_Services/>}></Route>
          <Route path="/shopping_cart" element={<Shopping_Cart/>}></Route>
          <Route path="/map" element={<Map/>}></Route>
          <Route path="/select" element={<Select/>}></Route>
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
