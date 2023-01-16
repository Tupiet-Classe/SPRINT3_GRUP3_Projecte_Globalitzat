from kivymd.app import MDApp
from kivymd.uix.screenmanager import MDScreenManager
from views.CourseScreen import CourseScreen
from views.DetailCourseScreen import DetailCourseScreen


class MyApp(MDApp):
    sm = None
    # Mètode per crear la classe, aquí estaria l'inici
    
    def build(self):
        self.title ="Inici"
        self.sm = self.root
    
    def switch_screen(self, screen_name):
        self.sm.current = screen_name

if __name__ == "__main__":
    app = MyApp() #Instància d'una classe
    app.run()
 
